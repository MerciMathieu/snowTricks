<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use App\Form\TrickType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/trick/create", name="trick_add")
     * @Security("is_granted('ROLE_USER')")
     */
    public function trickAdd(Request $request, EntityManagerInterface $manager)
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick->handleMedias();
            $trick->setAuthor($this->getUser());
            $manager->persist($trick);
            $manager->flush();

            $this->addFlash('success', "Félicitations! Vous avez créé une figure");

            return $this->redirectToRoute('trick', [
                'slug' => $trick->getSlug()
            ]);
        }

        return $this->render('trick/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/trick/delete/{id}", name="trick_delete")
     * @Security("is_granted('ROLE_USER')")
     */
    public function trickRemove(Trick $trick, EntityManagerInterface $manager)
    {
        $manager->remove($trick);
        $manager->flush();
        $this->addFlash('success', "La figure {$trick->getTitle()} a été supprimée");

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/trick/update/{slug}", name="trick_update")
     * @Security("is_granted('ROLE_USER')")
     */
    public function trickUpdate(Trick $trick, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (empty($trick->getTypedMediasUrl('image'))) {
                $trick->addDefaultImage();
            }
            $trick->handleMedias($trick);

            $manager->flush();

            $this->addFlash('success', "La figure a bien été modifiée.");

            return $this->redirectToRoute('trick', [
                'slug' => $trick->getSlug()
            ]);
        }
        return $this->render('trick/update.html.twig', [
            'form' => $form->createView(),
            'trick' => $trick
        ]);
    }

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
        $form = $this->createForm(CommentType::class, $comment);
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
