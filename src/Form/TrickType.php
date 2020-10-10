<?php

namespace App\Form;

use App\Entity\Trick;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre",
                'attr' => [
                    'placeholder' => "Le nom de la figure"
                ]
            ])
            ->add('shortDescription', TextType::class, [
                'label' => "Description courte",
                'attr' => [
                    'placeholder' => "En quelques mots..."
                ]
            ])
            ->add(
                'description',
                TextareaType::class,
                [
                    'label' => "Description",
                    'attr' => [
                        'placeholder' => "Une description complète",
                        'rows' => 10
                    ]
                ]
            )
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'grab' => 'Grab',
                    'ride' => 'Ride',
                    'rotation' => 'Rotation',
                    'flip' => 'Flip',
                    'slide' => 'Slide'
                ]
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => MediaType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
            ])
            ->add('videos', CollectionType::class, [
                'entry_type' => MediaType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
            ])
            ->add('save', SubmitType::class, [
                "label" => "Valider",
                'attr' => [
                    "class" => "btn btn-dark"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
