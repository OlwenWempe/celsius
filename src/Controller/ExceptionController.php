<?php

namespace App\Controller;

use App\Entity\Exception;
use App\Form\ExceptionType;
use App\Repository\ExceptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/exception')]
class ExceptionController extends AbstractController
{
    #[Route('/', name: 'app_exception_index', methods: ['GET'])]
    public function index(ExceptionRepository $exceptionRepository): Response
    {
        return $this->render('exception/index.html.twig', [
            'exceptions' => $exceptionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_exception_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ExceptionRepository $exceptionRepository): Response
    {
        $exception = new Exception();
        $form = $this->createForm(ExceptionType::class, $exception);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exceptionRepository->save($exception, true);

            return $this->redirectToRoute('app_exception_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('exception/new.html.twig', [
            'exception' => $exception,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exception_show', methods: ['GET'])]
    public function show(Exception $exception): Response
    {
        return $this->render('exception/show.html.twig', [
            'exception' => $exception,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_exception_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exception $exception, ExceptionRepository $exceptionRepository): Response
    {
        $form = $this->createForm(ExceptionType::class, $exception);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exceptionRepository->save($exception, true);

            return $this->redirectToRoute('app_exception_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('exception/edit.html.twig', [
            'exception' => $exception,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exception_delete', methods: ['POST'])]
    public function delete(Request $request, Exception $exception, ExceptionRepository $exceptionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exception->getId(), $request->request->get('_token'))) {
            $exceptionRepository->remove($exception, true);
        }

        return $this->redirectToRoute('app_exception_index', [], Response::HTTP_SEE_OTHER);
    }
}
