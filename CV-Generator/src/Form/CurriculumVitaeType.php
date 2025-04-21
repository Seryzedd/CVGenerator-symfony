<?php

namespace App\Form;

use App\Entity\CurriculumVitae;
use App\Entity\User;
use App\Entity\AsideBlock;
use App\Entity\MainBlock;
use App\Entity\Header;
use App\Form\BlockType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Service\FindFilesService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\MainCVBlocksConfigurationType;

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
            ->add('header', MainCVBlocksConfigurationType::class,[
                'label' => 'Header configuration',
                'data_class' => Header::class
            ])
            ->add('asideBlock', MainCVBlocksConfigurationType::class,[
                'label' => 'Side configuration',
                'data_class' => AsideBlock::class
            ])
            ->add('MainBlock', MainCVBlocksConfigurationType::class,[
                'label' => 'Main configuration',
                'data_class' => MainBlock::class
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
