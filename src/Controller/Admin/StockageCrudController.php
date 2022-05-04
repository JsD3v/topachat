<?php

namespace App\Controller\Admin;

use App\Entity\Stockage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StockageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stockage::class;
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
