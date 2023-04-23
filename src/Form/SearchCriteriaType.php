<?php

namespace App\Form;

use App\Entity\SearchCriteria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCriteriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ChargingDatePosition')
            ->add('loadingLocationPosition')
            ->add('orderNumberPosition')
            ->add('deliveryLocationPosition')
            ->add('quantityPosition')
            ->add('weightPosition')
            ->add('paletsPosition')
            ->add('deliveryDatePosition')
            ->add('commentPosition')
            ->add('addField1Position')
            ->add('addField2Position')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchCriteria::class,
        ]);
    }
}
