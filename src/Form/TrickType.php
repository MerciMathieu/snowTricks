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
    private function getConfigurations(
        string $label,
        string $placeholder = '',
        string $class = '',
        int $rows = null,
        int $cols = null,
        $options = []
    )
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder,
                'class' => $class,
                'rows' => $rows,
                'cols' => $cols
            ]
        ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfigurations("Titre", "Le nom de la figure"))
            ->add('shortDescription', TextType::class, $this->getConfigurations("Description courte", "En quelques mots..."))
            ->add(
                'description',
                TextareaType::class,
                $this->getConfigurations(
                    "Description",
                    "Une description complète",
                    '',
                    10,
                    null
                )
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
            ->add('medias', CollectionType::class, [
                'entry_type' => MediaType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
            ])
            ->add('save', SubmitType::class, $this->getConfigurations("Valider", "", "btn btn-dark"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
