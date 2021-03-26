<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('dateP1',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('dateP2',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
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
