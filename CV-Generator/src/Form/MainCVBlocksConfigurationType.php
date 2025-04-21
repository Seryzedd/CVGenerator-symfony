<?php

namespace App\Form;

use App\Entity\AbstractCVPortions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use App\Form\MergeType;
use App\Form\PaddingType;
use App\Form\ParagraphType;
use App\Entity\Paragraph;
use App\Entity\MainTitle;
use App\Entity\SubTitle;
use App\Entity\Padding;

class MainCVBlocksConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('backgroundColor', ColorType::class, [
                'row_attr' => [
                    'class' => 'd-flex align-items-center'
                ],
                'attr' => [
                    'class' => 'ms-2'
                ]
            ])
            ->add('merge', MergeType::class)
            ->add('paragraph', ParagraphType::class, ['data_class' => Paragraph::class])
            ->add('mainTitle', ParagraphType::class, ['data_class' => MainTitle::class])
            ->add('subTitle', ParagraphType::class, ['data_class' => SubTitle::class])
            ->add('padding', PaddingType::class, ['data_class' => Padding::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
