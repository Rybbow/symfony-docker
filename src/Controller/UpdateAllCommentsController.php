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
use App\Form\CommentsUpdateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UpdateAllCommentsController
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class UpdateAllCommentsController extends AbstractController
{

    /**
     * @Route("/article/{slug}/comments/update", name="article_comments_update")
     */
    public function index(Article $article, Request $request)
    {
        $form = $this->createForm(CommentsUpdateType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('article', [
                'slug' => $article->getSlug()
            ]);

        }

        return $this->render('article/comments_update.html.twig', [
            'form' => $form->createView()
        ]);

    }

}
