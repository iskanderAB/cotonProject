<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AVContollerController extends AbstractController
{
    /**
     * @Route("av", name="a_v_contoller")
     */
    public function index(): Response
    {
        return $this->render('av_contoller/index.html.twig', [
            'controller_name' => 'AVContollerController',
        ]);
    }
}
