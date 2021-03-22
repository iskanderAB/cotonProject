<?php

namespace App\Controller;

use App\Entity\TicketPesee;
use App\Form\TicketPeseeType;
use App\Repository\TicketPeseeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tickets")
 */
class TicketPeseeController extends AbstractController
{
    /**
     * @Route("/", name="ticket_pesee_index", methods={"GET"})
     */
    public function index(TicketPeseeRepository $ticketPeseeRepository): Response
    {
        return $this->render('ticket_pesee/index.html.twig', [
            'ticket_pesees' => $ticketPeseeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ticket_pesee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ticketPesee = new TicketPesee();
        $form = $this->createForm(TicketPeseeType::class, $ticketPesee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticketPesee);
            $entityManager->flush();

            return $this->redirectToRoute('ticket_pesee_index');
        }

        return $this->render('ticket_pesee/new.html.twig', [
            'ticket_pesee' => $ticketPesee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ticket_pesee_show", methods={"GET"})
     */
    public function show(TicketPesee $ticketPesee): Response
    {
        return $this->render('ticket_pesee/show.html.twig', [
            'ticket_pesee' => $ticketPesee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ticket_pesee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TicketPesee $ticketPesee): Response
    {
        $form = $this->createForm(TicketPeseeType::class, $ticketPesee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticket_pesee_index');
        }

        return $this->render('ticket_pesee/edit.html.twig', [
            'ticket_pesee' => $ticketPesee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ticket_pesee_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TicketPesee $ticketPesee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticketPesee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ticketPesee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ticket_pesee_index');
    }
}
