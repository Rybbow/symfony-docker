<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /** @var RequestStack */
    private $requestStack;

    /**
     * AboutController constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @Route("/about", name="about")
     */
    public function index()
    {
//        dump($this->requestStack->getMasterRequest());
//        dump($this->requestStack->getCurrentRequest());
//        dump($this->requestStack->getParentRequest());

        return new Response('O nas');
    }
}
