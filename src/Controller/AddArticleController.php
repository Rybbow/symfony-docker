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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddArticleController
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class AddArticleController extends AbstractController
{
    /**
     * @Route("article/add", name="addArticle")
     */
    public function index(): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $article = new Article();
        $i = rand(0, 10);
        $article->setTitle('title '.$i);
        $article->setContent('content '.$i);

        $manager->persist($article);
        $manager->flush();

        return $this->redirectToRoute('article',[
            'slug' => $article->getSlug()
        ]);
    }
}
