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
        $search = $request->query->get('search');

        $query = $filmsRepository->findByFilters($genreId, $year, $search);

        $films = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            28
        );

        if ($request->isXmlHttpRequest()) {
            return $this->render('films/_films_grid.html.twig', [
                'films' => $films,
            ]);
        }

        // Fetch ONLY genres that are associated with at least one film (filtered by year if selected)
        $genresQuery = $doctrine->getRepository(Genres::class)->createQueryBuilder('g')
            ->join('g.films', 'f');
        
        if ($year) {
            $genresQuery->andWhere('f.annee = :year')
                ->setParameter('year', $year);
        }

        $genres = $genresQuery->orderBy('g.nom_Genre', 'ASC')
            ->getQuery()
            ->getResult();
        
        // Get unique years for the filter (filtered by genre if selected)
        $yearsQuery = $doctrine->getRepository(Films::class)->createQueryBuilder('f')
            ->select('DISTINCT f.annee')
            ->where('f.annee IS NOT NULL');

        if ($genreId) {
            $yearsQuery->join('f.genres', 'g')
                ->andWhere('g.id_Genre = :genreId')
                ->setParameter('genreId', $genreId);
        }

        $years = $yearsQuery->orderBy('f.annee', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('films/index.html.twig', [
            'films' => $films,
            'genres' => $genres,
            'years' => $years,
            'selectedGenre' => $genreId,
            'selectedYear' => $year,
            'search' => $search,
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
