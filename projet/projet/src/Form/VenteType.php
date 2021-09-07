<?php

namespace App\Form;

use App\Entity\Vente;
use App\Entity\Client;
use App\Entity\Produit;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite')
            ->add('modePaie', ChoiceType::class, [
                'choices' => [
                    'Espece'=>'Espece',
                    'Cheque' => 'Cheque'
                ],
                'placeholder'=> 'Selectionnez Le Mode De paiement'
            ])

            
            ->add('produits', EntityType::class, array(
                'class' => Produit::class,
              
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
                'required' => false))

                ->add('client', EntityType::class, [
                    // looks for choices from this entity
                    'class' => Client::class,
                    'label' => 'Client',
                    'placeholder'=> 'Selectionnez Un Client',
              // uses the category name property as the visible option string
                    'choice_label' => 'nom',])
                    ->add('prix_u')
        ;




                }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vente::class,
        ]);
    }
}
