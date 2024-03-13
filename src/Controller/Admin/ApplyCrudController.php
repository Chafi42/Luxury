<?php

namespace App\Controller\Admin;

use App\Entity\Apply;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ApplyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Apply::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('candidate'),
            IntegerField::new('offer'),
            DateField::new ('submittedAt'),
            AssociationField::new('status'),
        ];
    }

}
