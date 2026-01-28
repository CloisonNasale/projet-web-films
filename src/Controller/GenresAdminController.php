<?php

namespace App\Controller;

use App\Entity\Genres;
use App\Form\GenresType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/genres/admin')]
#[IsGranted('ROLE_USER')]
final class GenresAdminController extends AbstractController
{
    #[Route(name: 'app_genres_admin_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $genres = $entityManager
            ->getRepository(Genres::class)
            ->findAll();

        return $this->render('genres_admin/index.html.twig', [
            'genres' => $genres,
        ]);
    }

    #[Route('/new', name: 'app_genres_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $genre = new Genres();
        $form = $this->createForm(GenresType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($genre);
            $entityManager->flush();

            return $this->redirectToRoute('app_genres_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('genres_admin/new.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_genres_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genres $genre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GenresType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_genres_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('genres_admin/edit.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_genres_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Genres $genre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$genre->getIdGenre(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($genre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_genres_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
