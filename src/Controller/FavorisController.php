<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class FavorisController extends AbstractController
{
    #[Route('/favoris/toggle/{id}', name: 'favoris_toggle')]
    public function toggleFavori(
        Films $film,
        EntityManagerInterface $em
    ) {
        /** @var Compte $compte */
        $compte = $this->getUser();

        if (!$compte) {
            throw $this->createAccessDeniedException();
        }

        if ($compte->getFavoris()->contains($film)) {
            $compte->removeFavori($film);
        } else {
            $compte->addFavori($film);
        }

        $em->flush();

        return $this->redirectToRoute('app_home');
    }

    #[Route('/favoris/export', name: 'favoris_export')]
    public function exportCsv(): Response
    {
        /** @var Compte $user */
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour exporter vos favoris.');
        }

        $favoris = $user->getFavoris(); // Récupère les films favoris

        // Commencer le CSV avec l'encodage UTF-8 BOM pour Excel
        $csvContent = "\xEF\xBB\xBF"; // BOM
        $csvContent .= "Titre,Année,Genres\n";

        foreach ($favoris as $film) {
            // Récupérer tous les genres séparés par une virgule
            $genres = implode(',', $film->getGenres()->map(fn($g) => $g->getNomGenre())->toArray());

            $csvContent .= sprintf(
                "\"%s\",%s,\"%s\"\n",
                $film->getTitre(),
                $film->getAnnee(),
                $genres
            );
        }

        // Créer la réponse avec les headers pour téléchargement
        $response = new Response($csvContent);
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="favoris.csv"');

        return $response;
    }
}
