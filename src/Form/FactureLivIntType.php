<?php

namespace App\Form;

use App\Entity\FactureLivInt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureLivIntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numFacLiv')
            ->add('date')
            ->add('modPaie')
            ->add('modLiv')
            ->add('datePaie')
            ->add('obs')
            ->add('bordereauLiv')
            ->add('bordereauReg')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FactureLivInt::class,
        ]);
    }
}
