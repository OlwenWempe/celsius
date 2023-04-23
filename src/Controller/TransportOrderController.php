<?php

namespace App\Controller;

use App\Entity\TransportOrder;
use App\Form\TransportOrderType;
use App\Repository\TransportOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transport/order')]
class TransportOrderController extends AbstractController
{
    #[Route('/', name: 'app_transport_order_index', methods: ['GET'])]
    public function index(TransportOrderRepository $transportOrderRepository): Response
    {
        return $this->render('transport_order/index.html.twig', [
            'transport_orders' => $transportOrderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_transport_order_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TransportOrderRepository $transportOrderRepository): Response
    {
        $transportOrder = new TransportOrder();
        $form = $this->createForm(TransportOrderType::class, $transportOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $transportOrderRepository->save($transportOrder, true);

            return $this->redirectToRoute('app_transport_order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('transport_order/new.html.twig', [
            'transport_order' => $transportOrder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transport_order_show', methods: ['GET'])]
    public function show(TransportOrder $transportOrder): Response
    {
        return $this->render('transport_order/show.html.twig', [
            'transport_order' => $transportOrder,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_transport_order_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TransportOrder $transportOrder, TransportOrderRepository $transportOrderRepository): Response
    {
        $form = $this->createForm(TransportOrderType::class, $transportOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $transportOrderRepository->save($transportOrder, true);

            return $this->redirectToRoute('app_transport_order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('transport_order/edit.html.twig', [
            'transport_order' => $transportOrder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transport_order_delete', methods: ['POST'])]
    public function delete(Request $request, TransportOrder $transportOrder, TransportOrderRepository $transportOrderRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transportOrder->getId(), $request->request->get('_token'))) {
            $transportOrderRepository->remove($transportOrder, true);
        }

        return $this->redirectToRoute('app_transport_order_index', [], Response::HTTP_SEE_OTHER);
    }
}
