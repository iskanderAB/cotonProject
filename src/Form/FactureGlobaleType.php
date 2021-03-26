<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('date',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('modPaie')
            ->add('datePaie',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
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
