<?php

namespace App\Controller;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(Request $request)
    {
        $articles = [
            'artykuł1',
            'artykuł2',
            'artykuł3',
            'artykuł1',
            'artykuł2',
            'artykuł3',
            'artykuł1',
            'artykuł2',
            'artykuł3',
            'artykuł1',
            'artykuł2',
            'artykuł3',
            'artykuł1',
            'artykuł2',
            'artykuł3',
            'artykuł1',
            'artykuł2',
            'artykuł3',
        ];

        $page = $request->query->get('page', 1);

        $adapter = new ArrayAdapter($articles);
        $pager = new Pagerfanta($adapter);
        $pager->setCurrentPage($page);
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
            'my_pager' => $pager
        ]);
    }
}
