<?php

namespace App\Controller\Admin;

use App\Entity\Ventirad;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VentiradCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ventirad::class;
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
