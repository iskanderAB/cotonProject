<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CGIController extends AbstractController
{
    /**
     * @Route("/cgi", name="c_g_i")
     */
    public function index(): Response
    {
        return $this->render('cgi/index.html.twig', [
            'controller_name' => 'CGIController',
        ]);
    }
}
