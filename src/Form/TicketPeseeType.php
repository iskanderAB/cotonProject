<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use App\Entity\TicketPesee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketPeseeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numTicket',TextType::class)
            ->add('compagne',TextType::class)
            ->add('numCaisse',TextType::class)
            ->add('dateP1',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('dateP2',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('heureP1',TextType::class)
            ->add('heureP2',TextType::class)
            ->add('peseur',TextType::class)
            ->add('poidsP1',TextType::class)
            ->add('poidsP2',TextType::class)
            ->add('factureLivCot',ChoiceType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TicketPesee::class,
        ]);
    }
}
