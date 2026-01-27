<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompteController extends AbstractController
{
    // Supprime le compte de l'utilisateur connecté
    #[Route('/compte/supprimer', name: 'compte_supprimer', methods: ['POST'])]
    public function supprimerCompte(EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour supprimer votre compte.');
            return $this->redirectToRoute('app_login');
        }

        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('delete-account', $submittedToken)) {
            $this->addFlash('error', 'Token de sécurité invalide.');
            return $this->redirectToRoute('profil');
        }

        $entityManager->remove($user);
        $entityManager->flush();

        $this->container->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();

        return $this->redirectToRoute('app_home');
    }

    #[Route('/profile/password', name: 'profile_password')]
    public function changePassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ) {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException();
        }

        if ($request->isMethod('POST')) {

            // CSRF
            if (
                !$this->isCsrfTokenValid(
                    'change_password',
                    $request->request->get('_token')
                )
            ) {
                throw $this->createAccessDeniedException();
            }

            $currentPassword = $request->request->get('current_password');
            $newPassword = $request->request->get('new_password');
            $confirmPassword = $request->request->get('confirm_password');

            // Vérification ancien mot de passe
            if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                $this->addFlash('error', 'Mot de passe actuel incorrect');
                return $this->redirectToRoute('profile_password');
            }

            // Vérification confirmation
            if ($newPassword !== $confirmPassword) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas');
                return $this->redirectToRoute('profile_password');
            }

            // Hash + sauvegarde
            $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
            $user->setPassword($hashedPassword);
            $entityManager->flush();

            $this->addFlash('success', 'Mot de passe modifié avec succès');

            return $this->redirectToRoute('profil');
        }

        return $this->render('films/password.html.twig');
    }

}
