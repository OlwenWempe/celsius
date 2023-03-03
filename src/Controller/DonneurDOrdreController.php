<?php

namespace App\Controller;

use App\Entity\DonneurDOrdre;
use App\Form\DonneurDOrdreType;
use App\Repository\DonneurDOrdreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/donneur/d/ordre')]
class DonneurDOrdreController extends AbstractController
{
    #[Route('/', name: 'app_donneur_d_ordre_index', methods: ['GET'])]
    public function index(DonneurDOrdreRepository $donneurDOrdreRepository): Response
    {
        return $this->render('donneur_d_ordre/index.html.twig', [
            'donneur_d_ordres' => $donneurDOrdreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_donneur_d_ordre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DonneurDOrdreRepository $donneurDOrdreRepository): Response
    {
        $donneurDOrdre = new DonneurDOrdre();
        $form = $this->createForm(DonneurDOrdreType::class, $donneurDOrdre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $donneurDOrdreRepository->save($donneurDOrdre, true);

            return $this->redirectToRoute('app_donneur_d_ordre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('donneur_d_ordre/new.html.twig', [
            'donneur_d_ordre' => $donneurDOrdre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_donneur_d_ordre_show', methods: ['GET'])]
    public function show(DonneurDOrdre $donneurDOrdre): Response
    {
        return $this->render('donneur_d_ordre/show.html.twig', [
            'donneur_d_ordre' => $donneurDOrdre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_donneur_d_ordre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DonneurDOrdre $donneurDOrdre, DonneurDOrdreRepository $donneurDOrdreRepository): Response
    {
        $form = $this->createForm(DonneurDOrdreType::class, $donneurDOrdre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $donneurDOrdreRepository->save($donneurDOrdre, true);

            return $this->redirectToRoute('app_donneur_d_ordre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('donneur_d_ordre/edit.html.twig', [
            'donneur_d_ordre' => $donneurDOrdre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_donneur_d_ordre_delete', methods: ['POST'])]
    public function delete(Request $request, DonneurDOrdre $donneurDOrdre, DonneurDOrdreRepository $donneurDOrdreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $donneurDOrdre->getId(), $request->request->get('_token'))) {
            $donneurDOrdreRepository->remove($donneurDOrdre, true);
        }

        return $this->redirectToRoute('app_donneur_d_ordre_index', [], Response::HTTP_SEE_OTHER);
    }
}
