<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FilmsRepository;
use App\Entity\Films;

class FilmController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(FilmsRepository $filmsRepository): Response
    {
        $films = $filmsRepository->findAll();

        return $this->render('films/index.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route('/film/{id}', name: 'film_show')]
    public function show(Films $film): Response
    {
        $acteurs = $film->getActeurs(); // récupère tous les acteurs liés au film

        return $this->render('films/show.html.twig', [
            'film' => $film,
            'acteurs' => $acteurs,
        ]);
    }
}
