<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/pays/admin')]
#[IsGranted('ROLE_USER')]
final class PaysAdminController extends AbstractController
{
    #[Route(name: 'app_pays_admin_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $pays = $entityManager
            ->getRepository(Pays::class)
            ->findAll();

        return $this->render('pays_admin/index.html.twig', [
            'pays' => $pays,
        ]);
    }

    #[Route('/new', name: 'app_pays_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pay = new Pays();
        $form = $this->createForm(PaysType::class, $pay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pay);
            $entityManager->flush();

            return $this->redirectToRoute('app_pays_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pays_admin/new.html.twig', [
            'pay' => $pay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pays_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pays $pay, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PaysType::class, $pay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pays_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pays_admin/edit.html.twig', [
            'pay' => $pay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pays_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Pays $pay, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pay->getId_pays(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($pay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pays_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
