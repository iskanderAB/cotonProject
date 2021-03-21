<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactLivIntCotController extends AbstractController
{
    /**
     * @Route("/factlivint", name="fact_liv_int_cot")
     */
    public function index(): Response
    {
        return $this->render('fact_liv_int_cot/index.html.twig', [
            'controller_name' => 'FactLivIntCotController',
        ]);
    }
}
