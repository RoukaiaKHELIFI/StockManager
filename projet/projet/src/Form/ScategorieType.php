<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Scategorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('categorie', EntityType::class, [
                // looks for choices from this entity
                'class' => Categorie::class,
                'label' => 'nom de la catégorie',
          // uses the category name property as the visible option string
                'choice_label' => 'nom',
                
                
                'attr' => [
                    'class' =>'select'
                ]
                ]
                
                
                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scategorie::class,
        ]);
    }
}
