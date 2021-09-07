<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EditPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         
            ->add('password',PasswordType::class,array(
           
                'attr' => array(
                    'placeholder' => 'Entrez votre nouveau mot de passe'
                )
           ))
            ->add('confirmPassword',PasswordType::class,array(
           
                'attr' => array(
                    'placeholder' => 'Confirmer votre nouveau mot de passe'
                )
           ))
           ->add('valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
