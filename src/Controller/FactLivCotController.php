<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactLivCotController extends AbstractController
{
    /**
     * @Route("/factlivcot", name="fact_liv_cot")
     */
    public function index(): Response
    {
        return $this->render('fact_liv_cot/index.html.twig', [
            'controller_name' => 'FactLivCotController',
        ]);
    }
}
