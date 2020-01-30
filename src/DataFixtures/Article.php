<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Article extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $article = new \App\Entity\Article();
            $article->setTitle('Tytuł '.$i);
            $article->setContent('Lorem Ipsum .... '.$i);
            $manager->persist($article);
            $this->setReference('article_' . $i, $article);
        }

        $manager->flush();
    }
}
