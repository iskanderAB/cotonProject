<?php

namespace App\Controller;

use App\Entity\CentreGestInt;
use App\Form\CentreGestIntType;
use App\Repository\CentreGestIntRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cgi")
 */
class CentreGestIntController extends AbstractController
{
    /**
     * @Route("/", name="centre_gest_int_index", methods={"GET"})
     */
    public function index(CentreGestIntRepository $centreGestIntRepository): Response
    {
        return $this->render('centre_gest_int/index.html.twig', [
            'centre_gest_ints' => $centreGestIntRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="centre_gest_int_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $centreGestInt = new CentreGestInt();
        $form = $this->createForm(CentreGestIntType::class, $centreGestInt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($centreGestInt);
            $entityManager->flush();

            return $this->redirectToRoute('centre_gest_int_index');
        }

        return $this->render('centre_gest_int/new.html.twig', [
            'centre_gest_int' => $centreGestInt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centre_gest_int_show", methods={"GET"})
     */
    public function show(CentreGestInt $centreGestInt): Response
    {
        return $this->render('centre_gest_int/show.html.twig', [
            'centre_gest_int' => $centreGestInt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="centre_gest_int_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CentreGestInt $centreGestInt): Response
    {
        $form = $this->createForm(CentreGestIntType::class, $centreGestInt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('centre_gest_int_index');
        }

        return $this->render('centre_gest_int/edit.html.twig', [
            'centre_gest_int' => $centreGestInt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centre_gest_int_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CentreGestInt $centreGestInt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centreGestInt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($centreGestInt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('centre_gest_int_index');
    }
}
