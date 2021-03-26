<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('date',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('modPaie')
            ->add('modLiv')
            ->add('datePaie',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
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
