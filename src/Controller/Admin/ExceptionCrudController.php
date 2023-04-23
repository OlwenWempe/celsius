<?php

namespace App\Controller\Admin;

use App\Entity\Exception;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExceptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Exception::class;
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
