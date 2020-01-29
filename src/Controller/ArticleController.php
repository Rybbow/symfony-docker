<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/article/{name}", name="article")
     */
    public function index($name)
    {
        return new Response('<html><body><h1>'.$name.'</h1></body></html>');
    }
}
