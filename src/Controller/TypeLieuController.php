<?php

namespace App\Controller;

use App\Entity\TypeLieu;
use App\Form\TypeLieuType;
use App\Repository\TypeLieuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/lieu')]
class TypeLieuController extends AbstractController
{
    #[Route('/', name: 'app_type_lieu_index', methods: ['GET'])]
    public function index(TypeLieuRepository $typeLieuRepository): Response
    {
        return $this->render('type_lieu/index.html.twig', [
            'type_lieus' => $typeLieuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_lieu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeLieuRepository $typeLieuRepository): Response
    {
        $typeLieu = new TypeLieu();
        $form = $this->createForm(TypeLieuType::class, $typeLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeLieuRepository->save($typeLieu, true);

            return $this->redirectToRoute('app_type_lieu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_lieu/new.html.twig', [
            'type_lieu' => $typeLieu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_lieu_show', methods: ['GET'])]
    public function show(TypeLieu $typeLieu): Response
    {
        return $this->render('type_lieu/show.html.twig', [
            'type_lieu' => $typeLieu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_lieu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeLieu $typeLieu, TypeLieuRepository $typeLieuRepository): Response
    {
        $form = $this->createForm(TypeLieuType::class, $typeLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeLieuRepository->save($typeLieu, true);

            return $this->redirectToRoute('app_type_lieu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_lieu/edit.html.twig', [
            'type_lieu' => $typeLieu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_lieu_delete', methods: ['POST'])]
    public function delete(Request $request, TypeLieu $typeLieu, TypeLieuRepository $typeLieuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeLieu->getId(), $request->request->get('_token'))) {
            $typeLieuRepository->remove($typeLieu, true);
        }

        return $this->redirectToRoute('app_type_lieu_index', [], Response::HTTP_SEE_OTHER);
    }
}
