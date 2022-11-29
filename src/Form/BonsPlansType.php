<?php

namespace App\Form;

use App\Entity\BonsPlans;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonsPlansType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomBonPlan')
            ->add('description')
            ->add('lienBonPlan')
            ->add('lien_image_bon_plan')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BonsPlans::class,
        ]);
    }
}
