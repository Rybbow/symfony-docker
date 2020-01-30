<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Adapter\DoctrineORMAdapter;
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

        $articles = $this->getDoctrine()->getRepository(Article::class)->getArticles();

        $page = $request->query->get('page', 1);

        $adapter = new DoctrineORMAdapter($articles);
        $pager = new Pagerfanta($adapter);
        $pager->setMaxPerPage(3);
        $pager->setCurrentPage($page);

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
            'my_pager' => $pager
        ]);
    }
}
