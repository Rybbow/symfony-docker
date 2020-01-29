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

        $art = '<ul>';
        foreach ($articles as $a){
            $art .= '<li>'.$a.'</li>';
        }
        $art .= '</ul>';


        return new Response($art, 200);
    }
}
