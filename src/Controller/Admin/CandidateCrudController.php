<?php

namespace App\Controller\Admin;

use App\Entity\Candidate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Date;

class CandidateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidate::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user'),
            TextField::new('firstName'),
            TextField::new('lastName'),
            AssociationField::new('gender'),
            TextField::new('adress'),
            TextField::new('country'),
            TextField::new('nationality'),
            AssociationField::new('passportFile'),
            AssociationField::new('cv'),
            AssociationField::new('profilPicture'),
            TextField::new('placeOfBirth'),
            AssociationField::new('category'),
            TextField::new('experience'),
            TextField::new('shortDescription'),
            TextField::new('notes'),
            BooleanField::new('isAvailable'),
            BooleanField::new('isPassportValid'),
            DateField::new('createdAt'),
            DateField::new('updatedAt'),
            DateField::new('deletedAt'),
 
        ];
    }
    
}
