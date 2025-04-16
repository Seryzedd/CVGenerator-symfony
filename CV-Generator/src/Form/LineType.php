<?php

namespace App\Form;

use App\Entity\Block;
use App\Entity\Line;
use App\Form\LineDetailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class LineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startAt', null, [
                'widget' => 'single_text',
            ])
            ->add('endAt', null, [
                'widget' => 'single_text',
            ])
            ->add('title')
            ->add('companyName')
            ->add('block', EntityType::class, [
                'class' => Block::class,
                'choice_label' => 'title',
            ])
            ->add('lineDetails', CollectionType::class, [
                'entry_type' => LineDetailType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'd-none'
                ],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Line::class,
        ]);
    }
}
