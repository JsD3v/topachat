<?php

namespace App\Controller\Admin;

use App\Entity\Modularite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ModulariteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Modularite::class;
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
