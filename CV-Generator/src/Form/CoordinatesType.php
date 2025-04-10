<?php

namespace App\Form;

use App\Entity\Coordinates;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CoordinatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('phone')
            ->add('street')
            ->add('zipcode')
            ->add('city')
            ->add('country', ChoiceType::class, [
                'choices' => array_flip(Coordinates::COUNTRY_LIST)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coordinates::class,
        ]);
    }
}
