<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(TrickRepository $trickRepository)
    {
        $tricks = $trickRepository->findAll();

        return $this->render('home/index.html.twig', [
            'tricks' => $tricks
        ]);
    }

    /**
     * @Route("/trick/create", name="trick_add")
     */
    public function trickAdd(Request $request, EntityManagerInterface $manager)
    {
        $trick= new Trick();
        $media = new Media();
        $trick->addMedia($media);
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->setParsedMedias($trick);
            $trick->setAuthor($this->getUser());
            $trick->setSlug($trick->getSlug());
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
     * @Route("/trick/update/{slug}", name="trick_update")
     */
    public function trickUpdate(Trick $trick, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->setParsedMedias($trick);
            $trick->setSlug($trick->getSlug());
            $manager->persist($trick);
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

    private function setParsedMedias(Trick $trick): Media
    {
        $media = null;
        if ($trick->getMedias()) {
            foreach ($trick->getMedias() as $media) {
                if (stristr($media->getUrl(), '.jpg') || stristr($media->getUrl(), '.png')){
                    $media->setType(Media::TYPE_IMAGE);
                } else {
                    $videoUrl = $media->getUrl();
                    if (stripos($videoUrl, 'watch?v=')) {
                        $videoUrl = str_replace( 'watch?v=', 'embed/', $videoUrl );
                    }
                    if (stripos($videoUrl, '&')) {
                        $videoUrl = strstr($videoUrl, '&', true);
                    }
                    $media->setUrl($videoUrl);
                    $media->setType(Media::TYPE_VIDEO);
                }
            }
        }

        return $media;
    }

    /**
     * @Route("/trick/delete/{id}", name="trick_delete")
     */
    public function trickRemove(Trick $trick, EntityManagerInterface $manager)
    {
        $manager->remove($trick);
        $manager->flush();
        $this->addFlash('success', "La figure {$trick->getTitle()} a été supprimée");

        return $this->redirectToRoute('home');
    }
}
