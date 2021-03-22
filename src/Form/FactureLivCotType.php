<?php

namespace App\Form;

use App\Entity\FactureLivCot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureLivCotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numFactLiv')
            ->add('date')
            ->add('modPaie')
            ->add('modLiv')
            ->add('datePaie')
            ->add('obs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FactureLivCot::class,
        ]);
    }
}
