<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}
