<?php

namespace App\Form;

use App\Entity\ReflexEntries;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReflexEntriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('societyCode')
            ->add('agencyCode')
            ->add('serviceCode')
            ->add('operator')
            ->add('contractor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReflexEntries::class,
        ]);
    }
}
