<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CantonController extends AbstractController
{
    /**
     * @Route("/canton", name="canton")
     */
    public function index(): Response
    {
        return $this->render('canton/index.html.twig', [
            'controller_name' => 'CantonController',
        ]);
    }
}
