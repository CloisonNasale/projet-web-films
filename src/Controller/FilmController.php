<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Genres;
use App\Entity\Compte;
use App\Repository\FilmsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    // Affiche la page d'accueil avec la liste des films, les filtres et la pagination
    #[Route('/', name: 'app_home')]
    public function index(
        FilmsRepository $filmsRepository,
        ManagerRegistry $registry,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $genreId = $request->query->get('genre') ? $request->query->getInt('genre') : null;
        $year = $request->query->get('year');
        $search = $request->query->get('search');
        $sort = $request->query->get('tri', 'alpha');

        $query = $filmsRepository->findByFilters($genreId, $year, $search, $sort);

        $films = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            28
        );

        $genresQuery = $registry->getRepository(Genres::class)->createQueryBuilder('g')
            ->join('g.films', 'f');

        if ($year) {
            $genresQuery->andWhere('f.annee = :year')
                ->setParameter('year', $year);
        }

        $genres = $genresQuery->orderBy('g.nom_Genre', 'ASC')
            ->getQuery()
            ->getResult();

        $yearsQuery = $registry->getRepository(Films::class)->createQueryBuilder('f')
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

        if ($request->isXmlHttpRequest()) {
            return $this->json([
                'content' => $this->renderView('films/_films_grid.html.twig', ['films' => $films]),
                'genreOptions' => $this->renderView('films/_filter_options_genres.html.twig', [
                    'genres' => $genres,
                    'selectedGenre' => $genreId
                ]),
                'yearOptions' => $this->renderView('films/_filter_options_years.html.twig', [
                    'years' => $years,
                    'selectedYear' => $year
                ]),
            ]);
        }

        return $this->render('films/index.html.twig', [
            'films' => $films,
            'genres' => $genres,
            'years' => $years,
            'selectedGenre' => $genreId,
            'selectedYear' => $year,
            'search' => $search,
            'currentSort' => $sort,
        ]);
    }

    // Affiche les détails d'un film spécifique
    #[Route('/film/{id}', name: 'film_show')]
    public function show(Films $film): Response
    {
        return $this->render('films/show.html.twig', [
            'film' => $film,
            'acteurs' => $film->getActeurs(),
        ]);
    }

    // Affiche la liste des films favoris de l'utilisateur
    #[Route('/favoris', name: 'film_favoris')]
    public function favoris(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('films/favoris.html.twig', [
            'favoris' => $user->getFavoris(),
        ]);
    }

    // Affiche le profil de l'utilisateur, son panier et ses commandes
    #[Route('/profil', name: 'profil')]
    public function profil(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('films/profil.html.twig', [
            'compte' => $user,
            'panier' => $user->getPanier(),
            'commandes' => $user->getCommandes(),
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
