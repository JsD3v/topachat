<?php

namespace App\Controller\Admin;

use App\Entity\Configuration;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ConfigurationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Configuration::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('processeur')->autocomplete(),
            AssociationField::new('carte_mere')->autocomplete(),
            AssociationField::new('ram')->autocomplete(),
            AssociationField::new('ventirad')->autocomplete(),
            AssociationField::new('stockage')->autocomplete(),
            AssociationField::new('alimentation')->autocomplete()
        ];
    }

}
