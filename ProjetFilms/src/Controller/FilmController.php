<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FilmsRepository;

class FilmController extends AbstractController
{
    #[Route('/films', name: 'film_list')]
    public function index(FilmsRepository $filmsRepository): Response
    {
        // Récupère tous les films depuis la base de données
        $films = $filmsRepository->findAll();

        // Rend le template 'films/index.html.twig' en passant les films
        return $this->render('films/index.html.twig', [
            'films' => $films,
        ]);
    }
}
