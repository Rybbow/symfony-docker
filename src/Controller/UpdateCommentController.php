<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\UpdateCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UpdateCommentController extends AbstractController
{
    /**
     * @Route("/update/comment/{id}", name="update_comment")
     */
    public function index(Comment $comment, Request $request)
    {
        $form = $this->createForm(UpdateCommentType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->flush();

            return $this->redirectToRoute(
                'article',
                [
                    'slug' => $form->getData()->getArticle()->getSlug(),
                ]
            );
        }
        return $this->render('update_comment/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
