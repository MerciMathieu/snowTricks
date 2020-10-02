<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    private function getConfigurations(
        string $label,
        string $placeholder = '',
        string $class = '',
        $options = []
    ) {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder,
                'class' => $class,
            ]
        ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => 'Message:',
                'attr' => [
                    'placeholder' => 'Entrez votre commentaire'
                ]
            ])
            ->add('save', SubmitType::class, $this->getConfigurations("Valider", "", "btn btn-dark"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
