<?php

namespace App\Form;

use App\Entity\RecettesSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecettesSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maxPrice', NumberType::class, [
                'required' => false,
                'label' => false,
                'attr' =>[
                    'placeholder' => 'Prix maximum'
                ]
            ])
            ->add('minPrice', NumberType::class, [
                'required' => false,
                'label' => false,
                'attr' =>[
                    'placeholder' => 'Prix minimum'
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RecettesSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }

    /**Pour rendre l'URL plus propre */
    
    public function getBlockPrefix() {
        return '';
    }
}
