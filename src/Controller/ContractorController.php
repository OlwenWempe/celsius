<?php

namespace App\Controller;

use App\Entity\Contractor;
use App\Form\ContractorType;
use App\Repository\ContractorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contractor')]
class ContractorController extends AbstractController
{
    #[Route('/', name: 'app_contractor_index', methods: ['GET'])]
    public function index(ContractorRepository $contractorRepository): Response
    {
        return $this->render('contractor/index.html.twig', [
            'contractors' => $contractorRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contractor_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContractorRepository $contractorRepository): Response
    {
        $contractor = new Contractor();
        $form = $this->createForm(ContractorType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contractorRepository->save($contractor, true);

            return $this->redirectToRoute('app_contractor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contractor/new.html.twig', [
            'contractor' => $contractor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contractor_show', methods: ['GET'])]
    public function show(Contractor $contractor): Response
    {
        return $this->render('contractor/show.html.twig', [
            'contractor' => $contractor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contractor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contractor $contractor, ContractorRepository $contractorRepository): Response
    {
        $form = $this->createForm(ContractorType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contractorRepository->save($contractor, true);

            return $this->redirectToRoute('app_contractor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contractor/edit.html.twig', [
            'contractor' => $contractor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contractor_delete', methods: ['POST'])]
    public function delete(Request $request, Contractor $contractor, ContractorRepository $contractorRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contractor->getId(), $request->request->get('_token'))) {
            $contractorRepository->remove($contractor, true);
        }

        return $this->redirectToRoute('app_contractor_index', [], Response::HTTP_SEE_OTHER);
    }
}
