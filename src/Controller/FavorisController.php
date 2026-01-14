<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FavorisController extends AbstractController
{
    #[Route('/favoris/toggle/{id}', name: 'favoris_toggle')]
    public function toggleFavori(
        Films $film,
        EntityManagerInterface $em,
        Request $request
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

        // ✅ BON OBJET
        $referer = $request->headers->get('referer');

        return $this->redirect(
            $referer ?? $this->generateUrl('app_home')
        );
    }
}
