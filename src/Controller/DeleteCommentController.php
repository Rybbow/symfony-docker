<?php

namespace App\Controller;

use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DeleteCommentController extends AbstractController
{
    /**
     * @Route("/delete/comment/{id}", name="delete_comment")
     */
    public function index(Comment $comment){

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($comment);
        $manager->flush();

        return $this->redirectToRoute('article',[
            'slug' => $comment->getArticle()->getSlug()
        ]);

    }
}
