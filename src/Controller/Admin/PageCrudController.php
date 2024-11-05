<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\ContentElementType;
use App\Form\BlocType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $pageName): iterable
{
    return [
        TextField::new('title'),
        SlugField::new('slug')->setTargetFieldName('title'),

        // Gestion des Blocs (avec leurs ContentElements)
        CollectionField::new('blocs')
            ->setEntryType(BlocType::class)
            ->setCustomOption('entry_label', function ($bloc) {
                return $bloc->getName() . ' (Bloc ID: ' . $bloc->getId() . ')';
            })
            ->allowAdd()
            ->allowDelete(),

        // Gestion des ContentElements individuels
        CollectionField::new('contentElements')
            ->setEntryType(ContentElementType::class)
            ->setCustomOption('entry_label', function ($bloc) {
                return $bloc->getName() . ' (Bloc ID: ' . $bloc->getId() . ')';
            })
            ->allowAdd()
            ->allowDelete(),
    ];
}
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
