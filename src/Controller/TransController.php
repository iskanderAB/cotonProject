<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransController extends AbstractController
{
    /**
     * @Route("/trans", name="trans")
     */
    public function index(): Response
    {
        return $this->render('trans/index.html.twig', [
            'controller_name' => 'TransController',
        ]);
    }
}
