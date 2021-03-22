<?php

namespace App\Controller;

use App\Entity\FactureLivInt;
use App\Form\FactureLivIntType;
use App\Repository\FactureLivIntRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/factlivint")
 */
class FactureLivIntController extends AbstractController
{
    /**
     * @Route("/", name="facture_liv_int_index", methods={"GET"})
     */
    public function index(FactureLivIntRepository $factureLivIntRepository): Response
    {
        return $this->render('facture_liv_int/index.html.twig', [
            'facture_liv_ints' => $factureLivIntRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="facture_liv_int_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $factureLivInt = new FactureLivInt();
        $form = $this->createForm(FactureLivIntType::class, $factureLivInt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($factureLivInt);
            $entityManager->flush();

            return $this->redirectToRoute('facture_liv_int_index');
        }

        return $this->render('facture_liv_int/new.html.twig', [
            'facture_liv_int' => $factureLivInt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_liv_int_show", methods={"GET"})
     */
    public function show(FactureLivInt $factureLivInt): Response
    {
        return $this->render('facture_liv_int/show.html.twig', [
            'facture_liv_int' => $factureLivInt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="facture_liv_int_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FactureLivInt $factureLivInt): Response
    {
        $form = $this->createForm(FactureLivIntType::class, $factureLivInt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facture_liv_int_index');
        }

        return $this->render('facture_liv_int/edit.html.twig', [
            'facture_liv_int' => $factureLivInt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_liv_int_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FactureLivInt $factureLivInt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factureLivInt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($factureLivInt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('facture_liv_int_index');
    }
}
