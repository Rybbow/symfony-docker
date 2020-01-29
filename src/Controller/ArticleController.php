<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/article/{name}", name="article")
     */
    public function index($name, Request $request)
    {
        if ($name == '404')
//            throw $this->createNotFoundException();
            return new Response('404 not found !',Response::HTTP_NOT_FOUND);

        if ($name == 'o-nas') {
//            return $this->forward(AboutController::class.'::index');
            return $this->redirectToRoute('about');
        }

        $session = $request->getSession();

        $counter = $session->get('counter_' . $name, 0);

        $session->set('counter_' . $name, ++$counter);

        return $this->render('article/index.html.twig', [
            'controller_name' => $name,
            'counter' => $counter,
        ]);
    }
}
