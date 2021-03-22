<?php

namespace App\Form;

use App\Entity\AssociationVillagoise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssociationVillagoiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('libelle')
            ->add('rep')
            ->add('adr')
            ->add('email')
            ->add('numFix')
            ->add('mobile')
            ->add('fax')
            ->add('factureGlobale')
            ->add('besoin')
            ->add('bordereauReg')
            ->add('ticketPesee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AssociationVillagoise::class,
        ]);
    }
}
