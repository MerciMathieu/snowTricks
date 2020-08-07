<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/trick/{id}/{slug}", name="trick")
     */
    public function index(TrickRepository $trickRepository, $id)
    {
        $trick = $trickRepository->find($id);
        return $this->render('trick/index.html.twig', [
            'trick' => $trick
        ]);
    }
}
