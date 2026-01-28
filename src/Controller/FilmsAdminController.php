<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\FilmsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/films/admin')]
#[IsGranted('ROLE_USER')]
final class FilmsAdminController extends AbstractController
{
    #[Route(name: 'app_films_admin_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $films = $entityManager
            ->getRepository(Films::class)
            ->findAll();

        return $this->render('films_admin/index.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route('/new', name: 'app_films_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $film = new Films();
        $form = $this->createForm(FilmsType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($film);
            $entityManager->flush();

            return $this->redirectToRoute('app_films_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('films_admin/new.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_films_admin_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        #[MapEntity(mapping: ['id' => 'id_Film'])] Films $film,
        EntityManagerInterface $entityManager
    ): Response
    {
        $form = $this->createForm(FilmsType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_films_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('films_admin/edit.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_films_admin_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        #[MapEntity(mapping: ['id' => 'id_Film'])] Films $film,
        EntityManagerInterface $entityManager
    ): Response
    {
        if ($this->isCsrfTokenValid('delete'.$film->getIdFilm(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($film);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_films_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
