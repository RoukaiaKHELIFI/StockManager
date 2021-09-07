<?php

namespace App\Form;

use App\Entity\Achats;
use App\Entity\Produit;
use App\Entity\Fournisseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cout')
            ->add('quantite')
            ->add('sousTotal')
            ->add('total')
            ->add('remise')
            ->add('totalNet')
            ->add('modePaie')
            ->add('paye')
            ->add('produit', EntityType::class, [
                // looks for choices from this entity
                'class' => Produit::class,
                'label' => 'Produit',
          // uses the category name property as the visible option string
                'choice_label' => 'nom',])
                ->add('fournisseurs', EntityType::class, [
                    // looks for choices from this entity
                    'class' => Fournisseur::class,
                    'label' => 'Fournisseurs',
              // uses the category name property as the visible option string
                    'choice_label' => 'prenom',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Achats::class,
        ]);
    }
}
