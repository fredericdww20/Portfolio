<?php

namespace App\Form;

use App\Entity\Bloc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\ContentElementType;

class BlocType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Bloc Name',
            ])
            ->add('contentElements', CollectionType::class, [
                'entry_type' => ContentElementType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false, // Important pour bien gérer l'ajout dans les collections
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bloc::class,
        ]);
    }
}
