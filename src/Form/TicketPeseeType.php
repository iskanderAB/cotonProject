<?php

namespace App\Form;

use App\Entity\TicketPesee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketPeseeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numTicket')
            ->add('compagne')
            ->add('numCaisse')
            ->add('dateP1')
            ->add('dateP2')
            ->add('heureP1')
            ->add('heureP2')
            ->add('peseur')
            ->add('poidsP1')
            ->add('poidsP2')
            ->add('factureLivCot')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TicketPesee::class,
        ]);
    }
}
