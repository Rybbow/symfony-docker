<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

        $session = $request->getSession();

        $counter = $session->get('counter_' . $name, 0);

        $session->set('counter_' . $name, ++$counter);


        $backLink = "<a href='".$this->generateUrl('articles')."'>Back to list</a>";
        return new Response('<html><body><h1>'.$name.'</h1><p>'.$backLink.'</p><p>Wyświetlono: ' . $counter . '</p></body></html>');
    }
}
