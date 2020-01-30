<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function index(Article $article, Request $request)
    {
//        if ($article->getSlug() == '404')
////            throw $this->createNotFoundException();
//            return new Response('404 not found !',Response::HTTP_NOT_FOUND);

//        if ($article->getSlug() == 'o-nas') {
////            return $this->forward(AboutController::class.'::index');
//            return $this->redirectToRoute('about');
//        }

        $session = $request->getSession();

        $counter = $session->get('counter_' . $article->getId(), 0);

        $session->set('counter_' . $article->getId(), ++$counter);

        if($counter == 5){
            $this->addFlash('notice', 'Wchodzisz poraz 5.. nie rób tego.');
        }

        return $this->render('article/index.html.twig', [
            'article' => $article,
            'counter' => $counter,
        ]);
    }
}
