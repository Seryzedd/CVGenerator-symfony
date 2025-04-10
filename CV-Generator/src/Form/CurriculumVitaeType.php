<?php

namespace App\Form;

use App\Entity\CurriculumVitae;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Service\FindFilesService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class CurriculumVitaeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $finder = new FindFilesService();

        $templates = $finder->findInFolder('../templates/curriculum_vitae/templates');

        $builder
            ->add('name')
            ->add('template', ChoiceType::class, [
                'choices' => $templates
            ])
            ->add('profileImg', FileType::class)
            ->add('sideColor', ColorType::class)
            ->add('mainColor', ColorType::class)
            ->add('textSideColor', ColorType::class)
            ->add('textMainColor', ColorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CurriculumVitae::class,
        ]);
    }
}
