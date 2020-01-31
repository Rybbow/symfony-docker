<?php
/**
 * This file is part of the symfony-docker package.
 *
 * (c) Solvee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\EventSubscriber;


use App\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class PlainPasswordSubscriber
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class PlainPasswordSubscriber implements EventSubscriber
{

    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;

    /**
     * PlainPasswordSubscriber constructor.
     *
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function prePersist(LifecycleEventArgs $args){

        $this->preparePassword($args);
    }

    public function preUpdate(LifecycleEventArgs $args){

        $this->preparePassword($args);
    }

    private function preparePassword(LifecycleEventArgs $args){
        $obj = $args->getObject();
        if(! $obj instanceof User || is_null($obj->getPlainPassword())) {
            return;
        }

        $obj->setPassword($this->encoder->encodePassword($obj, $obj->getPlainPassword()));
    }

    /**
     * @inheritDoc
     */
    public function getSubscribedEvents()
    {
        return [Events::prePersist, Events::preUpdate];
    }
}
