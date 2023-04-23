<?php

namespace App\Controller\Admin;

use App\Entity\TypeLieu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeLieuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeLieu::class;
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
