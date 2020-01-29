<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BoostrapController extends AbstractController
{
    /**
     * @Route("/boostrap", name="boostrap")
     */
    public function index()
    {
        return $this->render('boostrap/index.html.twig', [
            'controller_name' => 'BoostrapController',
        ]);
    }
}
