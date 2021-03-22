<?php

namespace App\Form;

use App\Entity\BordereauReg;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BordereauRegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numBorReg')
            ->add('date')
            ->add('mntReg')
            ->add('modPaie')
            ->add('factureLivInts')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BordereauReg::class,
        ]);
    }
}
