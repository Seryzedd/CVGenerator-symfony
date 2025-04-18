<?php

namespace App\Form;

use App\Entity\CurriculumVitae;
use App\Entity\User;
use App\Form\BlockType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Service\FindFilesService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
            ->add('profileImg', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Profile picture'
            ])
            ->add('description', TextareaType::class, [
                'required' => false
            ])
            ->add('sideColor', ColorType::class)
            ->add('mainColor', ColorType::class)
            ->add('textSideColor', ColorType::class)
            ->add('textMainColor', ColorType::class)
            ->add('headBGColor', ColorType::class, [
                    'required' => false,
                    'empty_data' => '',
                    'label' => 'Header background color'
                ])
            ->add('headTextColor', ColorType::class,[
                    'required' => false,
                    'empty_data' => '',
                    'label' => 'Header text color'
                ])
            ->add('titleSideColor', ColorType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('titleMainColor', ColorType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('blocks', CollectionType::class, [
                'entry_type' => BlockType::class,
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
            'data_class' => CurriculumVitae::class,
        ]);
    }
}
