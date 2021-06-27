<?php

namespace App\Form;

use App\Entity\Author;

use App\Model\ArticleModel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ArticleType
 * @package App\Form
 */
class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => 'title'
                ],
                'label' => 'title',
            ])
            ->add('subtitle', TextType::class, [
                'attr' => [
                    'placeholder' => 'subtitle'
                ],
                'label' => 'subtitle',
            ])
            ->add('content', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'content'
                ],
                'label' => 'content',
            ])
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'name',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleModel::class,
        ]);
    }
}
