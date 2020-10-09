<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/trick/{slug}/{page<\d+>?1}", name="trick")
     */
    public function index(Trick $trick, Request $request, EntityManagerInterface $manager, CommentRepository $commentRepository, int $page)
    {
        $allCommentsFromTrick = $trick->getComments()->count();

        $limit = CommentRepository::LIMIT;
        $totalPages = ceil($trick->getComments()->count() / $limit);
        $start = $page * $limit - $limit;

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setAuthor($this->getUser());
            $comment->setTrick($trick);
            $trick->addComment($comment);
            $manager->persist($trick);
            $manager->flush();

            return $this->redirectToRoute('trick', [
                'slug' => $trick->getSlug(),
            ]);
        }

        return $this->render('trick/index.html.twig', [
            'trick' => $trick,
            'comment_form' => $form->createView(),
            'comments' => $commentRepository->findBy(['trick' => $trick], ['createdAt' => 'DESC'], $limit, $start),
            'totalPages' => $totalPages,
            'page' => $page,
            'nbComments' => $allCommentsFromTrick
        ]);
    }
}
