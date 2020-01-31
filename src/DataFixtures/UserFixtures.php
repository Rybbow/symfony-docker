<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$N5iQGNAdcBJ8fl4Frm/4Rg$cETKwHF8MbrqDAJQjvMvmMlfQf0YXdptTXCPhjzSGEo');
        $user->setEmail('example@example.com');

        $manager->persist($user);
        $manager->flush();

    }
}
