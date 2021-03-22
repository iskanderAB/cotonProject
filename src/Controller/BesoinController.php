<?php

namespace App\Controller;

use App\Entity\Besoin;
use App\Form\BesoinType;
use App\Repository\BesoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/besoin")
 */
class BesoinController extends AbstractController
{
    /**
     * @Route("/", name="besoin_index", methods={"GET"})
     */
    public function index(BesoinRepository $besoinRepository): Response
    {
        return $this->render('besoin/index.html.twig', [
            'besoins' => $besoinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="besoin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $besoin = new Besoin();
        $form = $this->createForm(BesoinType::class, $besoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($besoin);
            $entityManager->flush();

            return $this->redirectToRoute('besoin_index');
        }

        return $this->render('besoin/new.html.twig', [
            'besoin' => $besoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="besoin_show", methods={"GET"})
     */
    public function show(Besoin $besoin): Response
    {
        return $this->render('besoin/show.html.twig', [
            'besoin' => $besoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="besoin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Besoin $besoin): Response
    {
        $form = $this->createForm(BesoinType::class, $besoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('besoin_index');
        }

        return $this->render('besoin/edit.html.twig', [
            'besoin' => $besoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="besoin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Besoin $besoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$besoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($besoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('besoin_index');
    }
}
