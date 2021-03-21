<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailBesController extends AbstractController
{
    /**
     * @Route("/details", name="detail_bes")
     */
    public function index(): Response
    {
        return $this->render('detail_bes/index.html.twig', [
            'controller_name' => 'DetailBesController',
        ]);
    }
}
