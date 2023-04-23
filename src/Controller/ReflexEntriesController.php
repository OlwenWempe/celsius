<?php

namespace App\Controller;

use App\Entity\ReflexEntries;
use App\Form\ReflexEntriesType;
use App\Repository\ReflexEntriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reflex/entries')]
class ReflexEntriesController extends AbstractController
{
    #[Route('/', name: 'app_reflex_entries_index', methods: ['GET'])]
    public function index(ReflexEntriesRepository $reflexEntriesRepository): Response
    {
        return $this->render('reflex_entries/index.html.twig', [
            'reflex_entries' => $reflexEntriesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reflex_entries_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReflexEntriesRepository $reflexEntriesRepository): Response
    {
        $reflexEntry = new ReflexEntries();
        $form = $this->createForm(ReflexEntriesType::class, $reflexEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reflexEntriesRepository->save($reflexEntry, true);

            return $this->redirectToRoute('app_reflex_entries_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reflex_entries/new.html.twig', [
            'reflex_entry' => $reflexEntry,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reflex_entries_show', methods: ['GET'])]
    public function show(ReflexEntries $reflexEntry): Response
    {
        return $this->render('reflex_entries/show.html.twig', [
            'reflex_entry' => $reflexEntry,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reflex_entries_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReflexEntries $reflexEntry, ReflexEntriesRepository $reflexEntriesRepository): Response
    {
        $form = $this->createForm(ReflexEntriesType::class, $reflexEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reflexEntriesRepository->save($reflexEntry, true);

            return $this->redirectToRoute('app_reflex_entries_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reflex_entries/edit.html.twig', [
            'reflex_entry' => $reflexEntry,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reflex_entries_delete', methods: ['POST'])]
    public function delete(Request $request, ReflexEntries $reflexEntry, ReflexEntriesRepository $reflexEntriesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reflexEntry->getId(), $request->request->get('_token'))) {
            $reflexEntriesRepository->remove($reflexEntry, true);
        }

        return $this->redirectToRoute('app_reflex_entries_index', [], Response::HTTP_SEE_OTHER);
    }
}
