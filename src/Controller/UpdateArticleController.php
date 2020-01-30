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

namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UpdateArticleControler
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 *
 */
class UpdateArticleController extends AbstractController
{
    /**
     * @Route("/update/article/{slug}", name="update_article")
     */

    public function update(Article $article)
    {
        $manager = $this->getDoctrine()->getManager();

        $article->setTitle('New article name!');
        $manager->flush();

        return $this->redirectToRoute('article', [
            'slug' => $article->getSlug(),
        ]);
    }
}
