<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BordLivController extends AbstractController
{
    /**
     * @Route("/bordliv", name="bord_liv")
     */
    public function index(): Response
    {
        return $this->render('bord_liv/index.html.twig', [
            'controller_name' => 'BordLivController',
        ]);
    }
}
