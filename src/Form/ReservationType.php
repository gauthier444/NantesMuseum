<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class)
            ->add('FirstName', TextType::class)
            ->add('PhoneNumber', TelType::class)
            ->add('Mail', EmailType::class)
            ->add('Date', DateTimeType::class, [
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'years' => range(date('Y'), date('Y')+100),
            ])
            ->add('MuseumChoice', ChoiceType::class, [
                'choices' => [
                    'Musée d\'histoire' => 'museum1',
                    'Musée d\'arts de Nantes' => 'museum2',
                    'Musée Dobrée' => 'museum3',
                    'Musée Jules Verne' => 'museum4',
                    'Musée d\'histoire naturelle' => 'museum5',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
