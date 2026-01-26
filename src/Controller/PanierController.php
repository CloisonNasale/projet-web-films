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
    // Affiche le contenu du panier de l'utilisateur
    #[Route('/', name: 'panier_index')]
    public function index(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('panier/index.html.twig', [
            'panier' => $user->getPanier(),
        ]);
    }

    // Ajoute un film au panier
    #[Route('/add/{id}', name: 'panier_add', methods: ['POST', 'GET'])]
    public function add(Films $film, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'User not logged in'], Response::HTTP_UNAUTHORIZED);
        }

        $user->addPanier($film);
        $entityManager->flush();

        return $this->json([
            'message' => 'Film ajouté au panier',
            'count' => $user->getPanier()->count()
        ]);
    }

    // Supprime un film du panier
    #[Route('/remove/{id}', name: 'panier_remove')]
    public function remove(Films $film, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $user->removePanier($film);
        $entityManager->flush();

        return $this->redirectToRoute('panier_index');
    }

    // Valide la commande et vide le panier
    #[Route('/confirm', name: 'panier_confirm')]
    public function confirm(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $panier = $user->getPanier();

        if ($panier->isEmpty()) {
            $this->addFlash('warning', 'Votre panier est vide.');
            return $this->redirectToRoute('panier_index');
        }

        $cartItems = $panier->toArray();

        $order = new Commandes();
        $order->setDateCommande(new \DateTime());
        $order->setCompte($user);

        foreach ($cartItems as $film) {
            $order->getFilms()->add($film);
            $user->removePanier($film);
        }

        $entityManager->persist($order);
        $entityManager->flush();

        $this->addFlash('payment_success', 'Votre paiement a bien été réalisé');

        return $this->redirectToRoute('panier_index');
    }
}
