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
use App\Form\ArticleType;
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

    public function update(Article $article, \Symfony\Component\HttpFoundation\Request $request)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->flush();

            return $this->redirectToRoute(
                'article',
                [
                    'slug' => $form->getData()->getSlug(),
                ]
            );
        }

        return $this->render(
            'article/add.html.twig',
            [
                'form' => $form->createView(),
            ]
        );


    }
}
