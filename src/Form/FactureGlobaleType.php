<?php

namespace App\Form;

use App\Entity\FactureGlobale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureGlobaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numFactG')
            ->add('date')
            ->add('modPaie')
            ->add('datePaie')
            ->add('obs')
            ->add('credit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FactureGlobale::class,
        ]);
    }
}
