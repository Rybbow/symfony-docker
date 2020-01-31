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
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
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
    public function index(Article $article, Request $request): Response
    {
        $manager = $this->getDoctrine()->getManager();

        $comment = new Comment();
        $comment->setArticle($article);
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $comment->setArticle($article);

            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('article',[
                'slug' => $article->getSlug()
            ]);
        }

        return $this->render('article/index.html.twig', [
            'article' => $article,
            'counter' => 0,
            'form' => $form->createView(),
        ]);
    }
}
