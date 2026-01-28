<?php

namespace App\Controller;

use App\Entity\Prix;
use App\Form\PrixType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/prix/admin')]
#[IsGranted('ROLE_USER')]
final class PrixAdminController extends AbstractController
{
    #[Route(name: 'app_prix_admin_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $prixes = $entityManager
            ->getRepository(Prix::class)
            ->findAll();

        return $this->render('prix_admin/index.html.twig', [
            'prixes' => $prixes,
        ]);
    }

    #[Route('/new', name: 'app_prix_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prix = new Prix();
        $form = $this->createForm(PrixType::class, $prix);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prix);
            $entityManager->flush();

            return $this->redirectToRoute('app_prix_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('prix_admin/new.html.twig', [
            'prix' => $prix,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_prix_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prix $prix, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrixType::class, $prix);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_prix_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('prix_admin/edit.html.twig', [
            'prix' => $prix,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prix_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Prix $prix, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prix->getIdprix(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($prix);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prix_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
