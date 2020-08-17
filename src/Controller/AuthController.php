<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('auth/login.html.twig');
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function register()
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('auth/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
