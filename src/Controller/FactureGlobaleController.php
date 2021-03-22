<?php

namespace App\Controller;

use App\Entity\FactureGlobale;
use App\Form\FactureGlobaleType;
use App\Repository\FactureGlobaleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/factg")
 */
class FactureGlobaleController extends AbstractController
{
    /**
     * @Route("/", name="facture_globale_index", methods={"GET"})
     */
    public function index(FactureGlobaleRepository $factureGlobaleRepository): Response
    {
        return $this->render('facture_globale/index.html.twig', [
            'facture_globales' => $factureGlobaleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="facture_globale_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $factureGlobale = new FactureGlobale();
        $form = $this->createForm(FactureGlobaleType::class, $factureGlobale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($factureGlobale);
            $entityManager->flush();

            return $this->redirectToRoute('facture_globale_index');
        }

        return $this->render('facture_globale/new.html.twig', [
            'facture_globale' => $factureGlobale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_globale_show", methods={"GET"})
     */
    public function show(FactureGlobale $factureGlobale): Response
    {
        return $this->render('facture_globale/show.html.twig', [
            'facture_globale' => $factureGlobale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="facture_globale_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FactureGlobale $factureGlobale): Response
    {
        $form = $this->createForm(FactureGlobaleType::class, $factureGlobale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facture_globale_index');
        }

        return $this->render('facture_globale/edit.html.twig', [
            'facture_globale' => $factureGlobale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_globale_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FactureGlobale $factureGlobale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factureGlobale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($factureGlobale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('facture_globale_index');
    }
}
