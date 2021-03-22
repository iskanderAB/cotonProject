<?php

namespace App\Controller;

use App\Entity\FactureLivCot;
use App\Form\FactureLivCotType;
use App\Repository\FactureLivCotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/factlivcot")
 */
class FactureLivCotController extends AbstractController
{
    /**
     * @Route("/", name="facture_liv_cot_index", methods={"GET"})
     */
    public function index(FactureLivCotRepository $factureLivCotRepository): Response
    {
        return $this->render('facture_liv_cot/index.html.twig', [
            'facture_liv_cots' => $factureLivCotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="facture_liv_cot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $factureLivCot = new FactureLivCot();
        $form = $this->createForm(FactureLivCotType::class, $factureLivCot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($factureLivCot);
            $entityManager->flush();

            return $this->redirectToRoute('facture_liv_cot_index');
        }

        return $this->render('facture_liv_cot/new.html.twig', [
            'facture_liv_cot' => $factureLivCot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_liv_cot_show", methods={"GET"})
     */
    public function show(FactureLivCot $factureLivCot): Response
    {
        return $this->render('facture_liv_cot/show.html.twig', [
            'facture_liv_cot' => $factureLivCot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="facture_liv_cot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FactureLivCot $factureLivCot): Response
    {
        $form = $this->createForm(FactureLivCotType::class, $factureLivCot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facture_liv_cot_index');
        }

        return $this->render('facture_liv_cot/edit.html.twig', [
            'facture_liv_cot' => $factureLivCot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_liv_cot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FactureLivCot $factureLivCot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factureLivCot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($factureLivCot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('facture_liv_cot_index');
    }
}
