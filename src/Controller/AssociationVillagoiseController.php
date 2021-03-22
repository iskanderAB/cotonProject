<?php

namespace App\Controller;

use App\Entity\AssociationVillagoise;
use App\Form\AssociationVillagoiseType;
use App\Repository\AssociationVillagoiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/av")
 */
class AssociationVillagoiseController extends AbstractController
{
    /**
     * @Route("/", name="association_villagoise_index", methods={"GET"})
     */
    public function index(AssociationVillagoiseRepository $associationVillagoiseRepository): Response
    {
        return $this->render('association_villagoise/index.html.twig', [
            'association_villagoises' => $associationVillagoiseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="association_villagoise_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $associationVillagoise = new AssociationVillagoise();
        $form = $this->createForm(AssociationVillagoiseType::class, $associationVillagoise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($associationVillagoise);
            $entityManager->flush();

            return $this->redirectToRoute('association_villagoise_index');
        }

        return $this->render('association_villagoise/new.html.twig', [
            'association_villagoise' => $associationVillagoise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="association_villagoise_show", methods={"GET"})
     */
    public function show(AssociationVillagoise $associationVillagoise): Response
    {
        return $this->render('association_villagoise/show.html.twig', [
            'association_villagoise' => $associationVillagoise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="association_villagoise_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AssociationVillagoise $associationVillagoise): Response
    {
        $form = $this->createForm(AssociationVillagoiseType::class, $associationVillagoise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('association_villagoise_index');
        }

        return $this->render('association_villagoise/edit.html.twig', [
            'association_villagoise' => $associationVillagoise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="association_villagoise_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AssociationVillagoise $associationVillagoise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$associationVillagoise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($associationVillagoise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('association_villagoise_index');
    }
}
