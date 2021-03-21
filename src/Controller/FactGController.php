<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactGController extends AbstractController
{
    /**
     * @Route("/factg", name="fact_g")
     */
    public function index(): Response
    {
        return $this->render('fact_g/index.html.twig', [
            'controller_name' => 'FactGController',
        ]);
    }
}
