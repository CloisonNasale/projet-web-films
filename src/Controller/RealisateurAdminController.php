<?php

namespace App\Controller;

use App\Entity\Realisateurs;
use App\Form\RealisateursType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/realisateur/admin')]
#[IsGranted('ROLE_USER')]
final class RealisateurAdminController extends AbstractController
{
    #[Route(name: 'app_realisateur_admin_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $realisateurs = $entityManager
            ->getRepository(Realisateurs::class)
            ->findAll();

        return $this->render('realisateur_admin/index.html.twig', [
            'realisateurs' => $realisateurs,
        ]);
    }

    #[Route('/new', name: 'app_realisateur_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $realisateur = new Realisateurs();
        $form = $this->createForm(RealisateursType::class, $realisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($realisateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_realisateur_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('realisateur_admin/new.html.twig', [
            'realisateur' => $realisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_realisateur_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Realisateurs $realisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RealisateursType::class, $realisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_realisateur_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('realisateur_admin/edit.html.twig', [
            'realisateur' => $realisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_realisateur_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Realisateurs $realisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realisateur->getIdrealisateur(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($realisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_realisateur_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
