<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index()
    {
        $articles = [
            'artykuł1',
            'artykuł2',
            'artykuł3'
        ];

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
