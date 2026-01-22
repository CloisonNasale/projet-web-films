<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Compte;
use App\Entity\Commandes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'panier_index')]
    public function index(): Response
    {
        /** @var Compte $user */
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('panier/index.html.twig', [
            'panier' => $user->getPanier(),
        ]);
    }

    #[Route('/add/{id}', name: 'panier_add', methods: ['POST', 'GET'])]
    public function add(Films $film, EntityManagerInterface $em): Response
    {
        /** @var Compte $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'User not logged in'], Response::HTTP_UNAUTHORIZED);
        }

        $user->addPanier($film);
        $em->flush();

        // Return JSON for AJAX requests, redirect for standard requests (fallback)
        // For this task, we assume the JS will handle the JSON response.
        return $this->json([
            'message' => 'Film ajouté au panier',
            'count' => $user->getPanier()->count()
        ]);
    }

    #[Route('/remove/{id}', name: 'panier_remove')]
    public function remove(Films $film, EntityManagerInterface $em): Response
    {
        /** @var Compte $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $user->removePanier($film);
        $em->flush();

        return $this->redirectToRoute('panier_index');
    }

    #[Route('/confirm', name: 'panier_confirm')]
    public function confirm(EntityManagerInterface $em): Response
    {
        /** @var Compte $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $panier = $user->getPanier();

        if ($panier->isEmpty()) {
            $this->addFlash('warning', 'Votre panier est vide.');
            return $this->redirectToRoute('panier_index');
        }

        // Clone the list of films to avoid modification issues during iteration
        $filmsDuPanier = $panier->toArray();

        // Create new Order (Commande/Transaction)
        $commande = new Commandes();
        $commande->setDateCommande(new \DateTime());
        $commande->setCompte($user);

        foreach ($filmsDuPanier as $film) {
            $commande->getFilms()->add($film);
            $user->removePanier($film); // Clear cart as we move items to order
        }

        $em->persist($commande);
        $em->flush();

        $this->addFlash('payment_success', 'Votre paiement a bien été réalisé');

        return $this->redirectToRoute('panier_index');
    }
}
