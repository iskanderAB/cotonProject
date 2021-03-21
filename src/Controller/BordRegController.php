<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BordRegController extends AbstractController
{
    /**
     * @Route("/bordreg", name="bord_reg")
     */
    public function index(): Response
    {
        return $this->render('bord_reg/index.html.twig', [
            'controller_name' => 'BordRegController',
        ]);
    }
}
