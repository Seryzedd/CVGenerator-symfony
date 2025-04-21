<?php

namespace App\Form;

use App\Entity\Merge;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MergeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number', null, ['label' => 'Merge Number', 'empty_data' => 0, 'required' => false])
            ->add('type', ChoiceType::class, [
                'label' => 'Merge type',
                'choices' => [
                    'pixels' => 'px',
                    'percent' => '%',
                    'Characters size' => 'em',
                    'document size' => 'rem',
                    'Centimer' => 'cm'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Merge::class,
        ]);
    }
}
