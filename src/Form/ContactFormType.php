<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label_attr'=>[
                    'class'=>'form-label'],
                'label'=>'Nom',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Votre nom'
                ],
            ])
            ->add('email', EmailType::class,[
                'label_attr'=>[
                    'class'=>'form-label'],
                'label'=>'Email',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Votre email'
                ],
            ])
            ->add('telephone',TelType::class,[
                'label_attr'=>[
                    'class'=>'form-label'],
                'label'=>'Téléphone',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Votre numéro de téléphone'
                ],
            ] )
            ->add('message', TextareaType::class,[
                'label_attr'=>[
                    'class'=>'form-label'],
                'label'=>'Message',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Votre message'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
