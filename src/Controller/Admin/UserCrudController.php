<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\Cache\Lock;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Choice;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield EmailField::new('email')
            ->setHelp('Only emails from @postic.fr are accepted.');
        $roles = ['ROLE_ADMIN', 'ROLE_SAV_SUPERVISOR', 'ROLE_SAV'];
        yield ChoiceField::new('roles')
            ->setFormType(ChoiceType::class)
            ->setChoices(array_combine($roles, $roles))
            ->allowMultipleChoices()
            ->renderExpanded()
            ->renderAsBadges();
        yield BooleanField::new('is_verified')
            ->renderAsSwitch(false);
        yield BooleanField::new('is_verified')
            ->onlyOnForms();
        yield Field::new('first_name');
        yield Field::new('last_name');
        yield Field::new('password')
            ->onlyOnForms();
    }
}
