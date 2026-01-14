<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FilmsRepository;
use App\Entity\Films;
use App\Entity\Genres;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class FilmController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(FilmsRepository $filmsRepository, ManagerRegistry $doctrine, PaginatorInterface $paginator, Request $request): Response
    {
        $genreId = $request->query->get('genre') ? $request->query->getInt('genre') : null;
        $year = $request->query->get('year');

        $query = $filmsRepository->findByFilters($genreId, $year);

        $films = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            28
        );

        // Fetch ONLY genres that are associated with at least one film
        $genres = $doctrine->getRepository(Genres::class)->createQueryBuilder('g')
            ->join('g.films', 'f')
            ->orderBy('g.nom_Genre', 'ASC')
            ->getQuery()
            ->getResult();
        
        // Get unique years for the filter (already limited to Films table)
        $years = $doctrine->getRepository(Films::class)->createQueryBuilder('f')
            ->select('DISTINCT f.annee')
            ->where('f.annee IS NOT NULL')
            ->orderBy('f.annee', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('films/index.html.twig', [
            'films' => $films,
            'genres' => $genres,
            'years' => $years,
            'selectedGenre' => $genreId,
            'selectedYear' => $year,
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

        #[Route('/commandes', name: 'film_commande')]
    public function commandes(): Response
    {
        /** @var Compte $compte */
        $compte = $this->getUser();

        if (!$compte) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('films/commande.html.twig', [
            'commandes' => $compte->getCommandes(),
        ]);
    }

}
