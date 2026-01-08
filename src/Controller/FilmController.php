<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FilmsRepository;
use App\Entity\Films;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class FilmController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(FilmsRepository $filmsRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $films = $paginator->paginate(
            $filmsRepository->findAll(),
            $request->query->getInt('page', 1),
            28
        );

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

    #[Route('/favoris', name: 'film_favoris')]
    public function favoris(): Response
    {
        /** @var Compte $compte */
        $compte = $this->getUser();

        if (!$compte) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('films/favoris.html.twig', [
            'favoris' => $compte->getFavoris(),
        ]);
    }

    #[Route('/profil', name: 'profil')]
    public function profil(): Response
    {
        /** @var Compte $compte */
        $compte = $this->getUser();

        if (!$compte) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('films/profil.html.twig', [
            'compte' => $compte,
            'panier' => $compte->getPanier(),
            'commandes' => $compte->getCommandes(),
        ]);
    }


}
