<?php

namespace App\Controller;

use App\Entity\SearchCriteria;
use App\Form\SearchCriteriaType;
use App\Repository\SearchCriteriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/search/criteria')]
class SearchCriteriaController extends AbstractController
{
    #[Route('/', name: 'app_search_criteria_index', methods: ['GET'])]
    public function index(SearchCriteriaRepository $searchCriteriaRepository): Response
    {
        return $this->render('search_criteria/index.html.twig', [
            'search_criterias' => $searchCriteriaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_search_criteria_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SearchCriteriaRepository $searchCriteriaRepository): Response
    {
        $searchCriterion = new SearchCriteria();
        $form = $this->createForm(SearchCriteriaType::class, $searchCriterion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchCriteriaRepository->save($searchCriterion, true);

            return $this->redirectToRoute('app_search_criteria_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('search_criteria/new.html.twig', [
            'search_criterion' => $searchCriterion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_search_criteria_show', methods: ['GET'])]
    public function show(SearchCriteria $searchCriterion): Response
    {
        return $this->render('search_criteria/show.html.twig', [
            'search_criterion' => $searchCriterion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_search_criteria_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SearchCriteria $searchCriterion, SearchCriteriaRepository $searchCriteriaRepository): Response
    {
        $form = $this->createForm(SearchCriteriaType::class, $searchCriterion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchCriteriaRepository->save($searchCriterion, true);

            return $this->redirectToRoute('app_search_criteria_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('search_criteria/edit.html.twig', [
            'search_criterion' => $searchCriterion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_search_criteria_delete', methods: ['POST'])]
    public function delete(Request $request, SearchCriteria $searchCriterion, SearchCriteriaRepository $searchCriteriaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$searchCriterion->getId(), $request->request->get('_token'))) {
            $searchCriteriaRepository->remove($searchCriterion, true);
        }

        return $this->redirectToRoute('app_search_criteria_index', [], Response::HTTP_SEE_OTHER);
    }
}
