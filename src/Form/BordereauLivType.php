<?php

namespace App\Form;

use App\Entity\BordereauLiv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BordereauLivType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numBord')
            ->add('date')
            ->add('modPaie')
            ->add('modLiv')
            ->add('datePaie')
            ->add('delLiv')
            ->add('tauxRem')
            ->add('besoin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BordereauLiv::class,
        ]);
    }
}
