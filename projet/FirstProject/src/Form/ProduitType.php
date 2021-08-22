<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Scategorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('code')
            ->add('prix')
            ->add('mrp')
            ->add('prix_m')
            ->add('tax')
            ->add('unite')
            ->add('status')
            ->add('description')
            ->add('stock')
            ->add('image' , FileType::class, [
                'data_class' => null
            ])
            ->add('categorie', EntityType::class, [
                // looks for choices from this entity
                'class' => Categorie::class,
                'label' => 'nom de la catégorie',
          // uses the category name property as the visible option string
                'choice_label' => 'nom',])

               
                ->add('button', ButtonType::class, [
                    'label' => 'generate',
                    'attr' => array(
                        
                        'onclick' => 'myFunction();')
                ])
        ;

        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
