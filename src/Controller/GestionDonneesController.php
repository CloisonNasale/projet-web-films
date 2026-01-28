<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class GestionDonneesController extends AbstractController
{
    #[Route('/gestion-donnees', name: 'app_gestion_donnees')]
    public function index(): Response
    {
        return $this->render('gestion_donnees/index.html.twig');
    }
}
