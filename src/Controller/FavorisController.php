<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
class FavorisController extends AbstractController
{
    // Ajoute ou supprime un film des favoris
    #[Route('/favoris/toggle/{id}', name: 'favoris_toggle')]
    public function toggleFavori(Films $film, EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException();
        }

        $isFavorite = $user->getFavoris()->contains($film);

        if ($isFavorite) {
            $user->removeFavori($film);
        } else {
            $user->addFavori($film);
        }

        $entityManager->flush();

        // Si la requête est AJAX, retourner une réponse JSON
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                'success' => true,
                'isFavorite' => !$isFavorite
            ]);
        }

        // ✅ BON OBJET
        $referer = $request->headers->get('referer');

        return $this->redirect(
            $referer ?? $this->generateUrl('app_home')
        );
    }

    // Exporte la liste des favoris de l'utilisateur au format CSV
    #[Route('/favoris/export', name: 'favoris_export')]
    public function exportCsv(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour exporter vos favoris.');
        }

        $favoris = $user->getFavoris();

        $csvContent = "\xEF\xBB\xBF";
        $csvContent .= "Titre,Année,Genres\n";

        foreach ($favoris as $film) {
            $genres = implode(',', $film->getGenres()->map(fn($g) => $g->getNomGenre())->toArray());

            $csvContent .= sprintf(
                "\"%s\",%s,\"%s\"\n",
                $film->getTitre(),
                $film->getAnnee(),
                $genres
            );
        }

        $response = new Response($csvContent);
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="favoris.csv"');

        return $response;
    }
}
