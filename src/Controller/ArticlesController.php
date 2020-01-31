<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\DateFilterType;
use App\Repository\RepositoryInterface;
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
     * @var RepositoryInterface $repository
     */
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route({
     *    "pl": "/{_locale}/artykuly",
     *    "en": "/{_locale}/articles"
     * }, name="articles")
     */
    public function index(Request $request)
    {
//        $dateFrom = $request->query->get('from', '1990-01-01');
//        $dateTo = $request->query->get('to', '2990-01-01');

        $form = $this->createForm(DateFilterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \DateTime $from */
            $from = $form->getData()['from'];
            $to = $form->getData()['to'];
            $articles = $this->repository->getArticles($from, $to);
        } else {
            $articles = $this->repository->getArticles();
        }

        $page = $request->query->get('page', 1);
        $adapter = new DoctrineORMAdapter($articles);
        $pager = new Pagerfanta($adapter);
        $pager->setMaxPerPage(3);
        $pager->setCurrentPage($page);

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
            'my_pager' => $pager,
            'filter_form' => $form->createView()
        ]);
    }

}
