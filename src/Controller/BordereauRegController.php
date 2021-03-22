<?php

namespace App\Controller;

use App\Entity\BordereauReg;
use App\Form\BordereauRegType;
use App\Repository\BordereauRegRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bordreg")
 */
class BordereauRegController extends AbstractController
{
    /**
     * @Route("/", name="bordereau_reg_index", methods={"GET"})
     */
    public function index(BordereauRegRepository $bordereauRegRepository): Response
    {
        return $this->render('bordereau_reg/index.html.twig', [
            'bordereau_regs' => $bordereauRegRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bordereau_reg_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bordereauReg = new BordereauReg();
        $form = $this->createForm(BordereauRegType::class, $bordereauReg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bordereauReg);
            $entityManager->flush();

            return $this->redirectToRoute('bordereau_reg_index');
        }

        return $this->render('bordereau_reg/new.html.twig', [
            'bordereau_reg' => $bordereauReg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bordereau_reg_show", methods={"GET"})
     */
    public function show(BordereauReg $bordereauReg): Response
    {
        return $this->render('bordereau_reg/show.html.twig', [
            'bordereau_reg' => $bordereauReg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bordereau_reg_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BordereauReg $bordereauReg): Response
    {
        $form = $this->createForm(BordereauRegType::class, $bordereauReg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bordereau_reg_index');
        }

        return $this->render('bordereau_reg/edit.html.twig', [
            'bordereau_reg' => $bordereauReg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bordereau_reg_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BordereauReg $bordereauReg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bordereauReg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bordereauReg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bordereau_reg_index');
    }
}
