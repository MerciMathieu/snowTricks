<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ForgotPasswordType;
use App\Form\RegistrationType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
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
     * @Security("is_granted('IS_ANONYMOUS')")
     */
    public function forgotPassword(Request $request, \Swift_Mailer $mailer, UserRepository $repository, TokenGeneratorInterface $tokenGenerator, EntityManagerInterface $manager)
    {
        $form = $this->createForm(ForgotPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $user = $repository->findOneBy(['email' => $form->getData()->getEmail()]);

            if ($user) {
                $token = $tokenGenerator->generateToken();
                $user->setResetToken($token);
                $manager->flush();
                $url = $this->generateUrl('reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

                $message = $mailer->createMessage()
                    ->setSubject('Oubli de mot de passe - Réinisialisation')
                    ->setFrom('help@snowtricks.fr')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView(
                            'auth/emails/resetPasswordEmail.html.twig',
                            [
                            'user'=>$user,
                            'url'=>$url,
                            'token' => $token
                        ]
                        ),
                        'text/html'
                    );

                $mailer->send($message);
            }

            $this->addFlash('success', 'Tu recevras un email si il existe dans la base de données !');

            return $this->redirectToRoute('login');
        }

        return $this->render('auth/forgot-password.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/reset-password/{token}", name="reset_password")
     * @Security("is_granted('IS_ANONYMOUS')")
     */
    public function resetPassword(Request $request, UserRepository $repository, EntityManagerInterface $manager, string $token, UserPasswordEncoderInterface $encoder)
    {
        $user = $repository->findOneBy(['resetToken' => $token]);
        $form = $this->createForm(ResetPasswordType::class, $user);
        $form->handleRequest($request);

        if ($user && $form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $hash = $encoder->encodePassword($user, $data->getPassword());
            $user->setPassword($hash);
            $user->setResetToken(null);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', "Le mot de passe a été modifié");

            return $this->redirectToRoute('home');
        }

        return $this->render('auth/reset-password.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
