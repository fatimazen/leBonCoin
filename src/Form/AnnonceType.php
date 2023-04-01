<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use phpDocumentor\Reflection\Types\Float_;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("title")
            ->add('prix')
            ->add('description')
            // ->add('creation_date')
            // ->add('modification_date')
            ->add('category')
            ->add('city', ChoiceType::class,[
             'choices'=>[
                'Arles'=>'Arles',
                'Nimes'=>'Nimes',
                ]   
                ])
            ->add('departement')
            ->add('zip_city')
            // ->add('validity')
            ->add('etat')
            ->add('img')
            // ->add('user')
            // ->add('reponse')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
