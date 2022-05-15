<?php

namespace App\Form;

use App\Entity\Alimentation;
use App\Entity\Cartegraphique;
use App\Entity\CarteMere;
use App\Entity\Configuration;
use App\Entity\Processeur;
use App\Entity\Ram;
use App\Entity\Stockage;
use App\Entity\Ventirad;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigurationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('processeur', EntityType::class,[
                'placeholder'=>'Merci de choisir mon petit loulou',
                'class'=>Processeur::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],

            ])
            ->add('carte_mere', EntityType::class, [
              'placeholder' => '2Eme etape : la carte mere',
                'class'=>Cartemere::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],
            ])
            ->add('ram',EntityType::class,[
                'placeholder'=>'Et ça ram mon grand',
                'class' => Ram::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],

            ])
            ->add('alimentation', EntityType::class, [
                'placeholder' => '2Eme etape : l\'alimentation',
                'class'=>Alimentation::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],
            ])
            ->add('carte_graphique', EntityType::class, [
                'placeholder' => '2Eme etape : la carte graphique',
                'class'=>CarteGraphique::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],
            ])
            ->add('stockage', EntityType::class, [
                'placeholder' => '2Eme etape : le stockage',
                'class'=>Stockage::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],

            ])
            ->add('ventirad',EntityType::class,[
                'placeholder'=>'Merci de choisir mon ventirad',
                'class'=>Ventirad::class,
                'attr' => [
                    'class' => 'form-select show-tick'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Configuration::class,
        ]);
    }
}
