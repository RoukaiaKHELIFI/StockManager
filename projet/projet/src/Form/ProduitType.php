<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Scategorie;
use App\Form\ScategorieType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
            ->add('description',TextareaType::class)
            ->add('stock')
            ->add('image' , FileType::class, [
                'data_class' => null
            ])
            ->add('try', ButtonType::class, [
                'label' => 'generate',
                'attr' => array(
                    
                    'onclick' => 'myFunction();')
            ])
         
            ->add('categorie', EntityType::class, [
                // looks for choices from this entity
                'data_class' => null,
                'class' => Categorie::class,
                'label' => 'nom de la catégorie',
          // uses the category name property as the visible option string
                'choice_label' => 'nom',])
              
->add('scategorie', EntityType::class, [
    'data_class' => null,
    // looks for choices from this entity
    'class' => Scategorie::class,
 

// uses the category name property as the visible option string
    'choice_label' => 'nom',])

               
     
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
           
        ]);
    }
}
