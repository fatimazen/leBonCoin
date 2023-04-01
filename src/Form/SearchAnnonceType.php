<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ],
            ])
            ->add('annonce', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'recherche',
                'recherche' =>[
                'Titre' => 1,
                'categorie' => 2,
                'city' => 3,
                'departement' => 4,
                'zipCity' => 5,
                'prix'=> 6,
                'etat'=> 7,
                ],
                'required' => false
            ])
            ->add('annonces', EntityType::class, [
                'label' => false,
                'placeholder' => 'annonces',
                'class' => Season::class,
                'required' => false
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => [
                    'class' => 'btn btn-success'
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
