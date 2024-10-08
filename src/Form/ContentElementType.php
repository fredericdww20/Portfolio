<?php

namespace App\Form;

use App\Entity\ContentElement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentElementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Title' => 'title',
                    'Description' => 'description',
                    'Image' => 'image',
                ],
            ])
            ->add('value', TextareaType::class, [
                'attr' => ['rows' => 3],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContentElement::class,
        ]);
    }
}
