<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForgotPasswordType extends AbstractType
{
    private function getConfigurations($label, $placeholder = '', $class = '', $options = [])
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder,
                'class' => $class
            ]
        ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, $this->getConfigurations("Email", "Votre adresse email..."))
            ->add('save', SubmitType::class, $this->getConfigurations("Réinitialiser son mot de passe", "", "btn btn-dark"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
