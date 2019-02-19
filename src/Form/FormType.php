<?php

namespace App\Form;

use App\Entity\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('FirstName')
            ->add('Address')
            ->add('PostalCode')
            ->add('City')
            ->add('PhoneNumber')
            ->add('Mail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Form::class,
        ]);
    }
}
