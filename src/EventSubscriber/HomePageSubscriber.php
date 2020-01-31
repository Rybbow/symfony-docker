<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomePageSubscriber implements EventSubscriberInterface
{
    /**
     * @var UrlGeneratorInterface $router
     */
    private $router;

    /**
     * HomePageSubscriber constructor.
     *
     * @param UrlGeneratorInterface $router
     */
    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }


    public function onRequestEvent(RequestEvent $event)
    {
        if($event->getRequest()->getRequestUri() == '/') {
            $res = new RedirectResponse($this->router->generate('articles'));
            $event->setResponse($res);

        }
    }

    public static function getSubscribedEvents()
    {
        return [
            RequestEvent::class => [
                'onRequestEvent',
                1024
            ],
        ];
    }
}
