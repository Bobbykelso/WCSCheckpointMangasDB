<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'oeuvre'
            ])
            ->add('imageBook', TextType::class, [
                'label' => 'Url d\'image'
            ])
            ->add('synopsis', TextType::class, [
                'label' => 'Synopsis'
            ])
            ->add('status', TextType::class, [
                'label' => 'Statut de l\'oeuvre'
            ])
            ->add('gender', TextType::class, [
                'label' => 'Genres'
            ])
            ->add('author', TextType::class, [
                'label' => 'Auteur'
            ])
            ->add('artistes', TextType::class, [
                'label' => 'Artiste(s) dessinateur'
            ])
            ->add('isAnimated',CheckboxType::class, [
                'label' => 'Adaptation en animé'
            ])
            ->add('firstPublishAt', DateTimeType::class, [
                'label' => 'Date de publication'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
