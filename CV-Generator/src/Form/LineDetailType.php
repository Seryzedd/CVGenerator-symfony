<?php

namespace App\Form;

use App\Entity\Line;
use App\Entity\LineDetail;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LineDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('beforeCharacter', ChoiceType::class, [
                'choices' => [
                    '-' => '-',
                    '#' => '#',
                    '->' => '->',
                    '_' => '_'
                ],
                'required' => false
            ])
            ->add('line', EntityType::class, [
                'class' => Line::class,
                'choice_label' => 'title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LineDetail::class,
        ]);
    }
}
