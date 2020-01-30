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
use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddCommentController
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class AddCommentController extends AbstractController
{
    /**
     * @Route("comment/add/{slug}", name="addComment")
     */
    public function index(Article $article): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $comment = new Comment();
        $i = rand(0, 10);
        $comment->setEmail('title@ad.pl');
        $comment->setValue("Value ".$i);
        $comment->setArticle($article);

        $manager->persist($comment);
        $manager->flush();

        return $this->redirectToRoute('article',[
            'slug' => $article->getSlug()
        ]);
    }
}
