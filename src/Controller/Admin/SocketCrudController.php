<?php

namespace App\Controller\Admin;

use App\Entity\Socket;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SocketCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Socket::class;
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
