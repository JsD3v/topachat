<?php

namespace App\Controller\Admin;

use App\Entity\Cartegraphique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CartegraphiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cartegraphique::class;
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
