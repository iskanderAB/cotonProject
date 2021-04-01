<?php

namespace App\Form;

use App\Entity\AssociationVillagoise;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssociationVillagoiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code',TextType::class)
            ->add('libelle',TextType::class)
            ->add('rep',TextType::class)
            ->add('adr',TextType::class)
            ->add('email',TextType::class)
            ->add('numFix',NumberType::class)
            ->add('mobile',NumberType::class)
            ->add('fax',NumberType::class)
            ->add('factureGlobale',ChoiceType::class)
            ->add('besoin',ChoiceType::class)
            ->add('bordereauReg',ChoiceType::class)
            ->add('ticketPesee',ChoiceType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AssociationVillagoise::class,
        ]);
    }
}
