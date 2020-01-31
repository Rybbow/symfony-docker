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


use App\Form\ArticleType;
use App\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddArticleController
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class AddArticleController extends AbstractController
{
    /** @var ArticleService */
    private $articleService;

    /**
     * AddArticleController constructor.
     *
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("article/add", name="addArticle")
     */
    public function index(Request $request): Response
    {
        /** @var FormInterface $form */
        $form = $this->createForm(ArticleType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $article = $this->articleService->add($form->getData());

            return $this->redirectToRoute(
                'article',
                [
                    'slug' => $article->getSlug(),
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
