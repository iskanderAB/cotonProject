<?php

namespace App\Controller;

use App\Entity\BordereauLiv;
use App\Form\BordereauLivType;
use App\Repository\BordereauLivRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bordliv")
 */
class BordereauLivController extends AbstractController
{
    /**
     * @Route("/", name="bordereau_liv_index", methods={"GET"})
     */
    public function index(BordereauLivRepository $bordereauLivRepository): Response
    {
        return $this->render('bordereau_liv/index.html.twig', [
            'bordereau_livs' => $bordereauLivRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bordereau_liv_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bordereauLiv = new BordereauLiv();
        $form = $this->createForm(BordereauLivType::class, $bordereauLiv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bordereauLiv);
            $entityManager->flush();

            return $this->redirectToRoute('bordereau_liv_index');
        }

        return $this->render('bordereau_liv/new.html.twig', [
            'bordereau_liv' => $bordereauLiv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bordereau_liv_show", methods={"GET"})
     */
    public function show(BordereauLiv $bordereauLiv): Response
    {
        return $this->render('bordereau_liv/show.html.twig', [
            'bordereau_liv' => $bordereauLiv,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bordereau_liv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BordereauLiv $bordereauLiv): Response
    {
        $form = $this->createForm(BordereauLivType::class, $bordereauLiv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bordereau_liv_index');
        }

        return $this->render('bordereau_liv/edit.html.twig', [
            'bordereau_liv' => $bordereauLiv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bordereau_liv_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BordereauLiv $bordereauLiv): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bordereauLiv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bordereauLiv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bordereau_liv_index');
    }
}
