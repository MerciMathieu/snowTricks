<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $lastUserName = $utils->getLastUsername();

        return $this->render('auth/login.html.twig', [
            'hasError' => $error !== null,
            'lastUserName' => $lastUserName
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     * @Security("is_granted('ROLE_USER')")
     */
    public function logout()
    {
    }

    /**
     * @Route("/inscription", name="register")
     * @Security("is_granted('IS_ANONYMOUS')")
     */
    public function register(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface  $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', "Votre compte a bien été créé");

            return $this->redirectToRoute('login');
        }

        return $this->render('auth/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/forgot-password", name="forgot_password")
     */
    public function forgotPassword()
    {
        return $this->render('auth/forgot-password.html.twig');
    }

    /**
     * @Route("/reset-password", name="reset_password")
     */
    public function resetPassword()
    {
        return $this->render('auth/reset-password.html.twig');
    }
}
