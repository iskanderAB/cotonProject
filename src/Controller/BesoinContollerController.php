<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BesoinContollerController extends AbstractController
{
    /**
     * @Route("/besoins", name="besoin_contoller")
     */
    public function index(): Response
    {
        return $this->render('besoin_contoller/index.html.twig', [
            'controller_name' => 'BesoinContollerController',
        ]);
    }
}
