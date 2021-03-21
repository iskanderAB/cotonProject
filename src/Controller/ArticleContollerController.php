<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleContollerController extends AbstractController
{
    /**
     * @Route("/articles", name="article_contoller")
     */
    public function index(): Response
    {
        return $this->render('article_contoller/index.html.twig', [
            'controller_name' => 'ArticleContollerController',
        ]);
    }
}
