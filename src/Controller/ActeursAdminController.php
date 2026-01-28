<?php

namespace App\Controller;

use App\Entity\Acteurs;
use App\Form\ActeursType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/acteurs/admin')]
#[IsGranted('ROLE_USER')]
final class ActeursAdminController extends AbstractController
{
    #[Route(name: 'app_acteurs_admin_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $acteurs = $entityManager
            ->getRepository(Acteurs::class)
            ->findAll();

        return $this->render('acteurs_admin/index.html.twig', [
            'acteurs' => $acteurs,
        ]);
    }

    #[Route('/new', name: 'app_acteurs_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $acteur = new Acteurs();
        $form = $this->createForm(ActeursType::class, $acteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($acteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_acteurs_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('acteurs_admin/new.html.twig', [
            'acteur' => $acteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_acteurs_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Acteurs $acteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActeursType::class, $acteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_acteurs_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('acteurs_admin/edit.html.twig', [
            'acteur' => $acteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_acteurs_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Acteurs $acteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $acteur->getIdActeur(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($acteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_acteurs_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
