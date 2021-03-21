<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehController extends AbstractController
{
    /**
     * @Route("/veh", name="veh")
     */
    public function index(): Response
    {
        return $this->render('veh/index.html.twig', [
            'controller_name' => 'VehController',
        ]);
    }
}
