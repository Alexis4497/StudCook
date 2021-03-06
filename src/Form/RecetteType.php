<?php

namespace App\Form;

use App\Entity\Recettes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteType extends AbstractType
{

    public string $emb = 'embed';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreRecette')
            ->add('descriptionRecette')
            ->add('prixRecette')
            ->add ('lien_video') ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recettes::class,
        ]);
    }
}
