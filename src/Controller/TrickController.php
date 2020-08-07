<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/trick/{slug}", name="trick")
     */
    public function index(Trick $trick)
    {
        return $this->render('trick/index.html.twig', [
            'trick' => $trick
        ]);
    }
}
