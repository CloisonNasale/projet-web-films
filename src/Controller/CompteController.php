<?php
namespace App\Controller;

use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class CompteController extends AbstractController
{
    #[Route('/compte/supprimer', name: 'compte_supprimer', methods: ['POST'])]
    public function supprimerCompte(EntityManagerInterface $em, Request $request): Response
    {
        $user = $this->getUser(); 

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour supprimer votre compte.');
            return $this->redirectToRoute('app_login');
        }

        // Vérifier le token CSRF
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('delete-account', $submittedToken)) {
            $this->addFlash('error', 'Token de sécurité invalide.');
            return $this->redirectToRoute('profil');
        }

        $em->remove($user);
        $em->flush();

        $this->container->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();

        return $this->redirectToRoute('app_home');
    }

}
