<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class Comment extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $article = $this->getReference('article_'.$i);
            for ($j = 0; $j < 5; $j++) {
                $comment = new \App\Entity\Comment();
                $comment->setArticle($article);
                $comment->setEmail('example@example.com');
                $comment->setValue('Lorem ipsum... '.$j);
                $manager->persist($comment);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            Article::class,
        ];
    }
}
