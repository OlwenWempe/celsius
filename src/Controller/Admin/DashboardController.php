<?php

namespace App\Controller\Admin;

use App\Entity\Contractor;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lieu;
use App\Entity\TypeLieu;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('admin', ['_locale' => 'fr']);
    }

    #[Route('/admin/{_locale<%app.supported_locales%>}/', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Celsius')
            ->setFaviconPath('images/icon_celsius.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('HomePage', 'fa fa-home', $this->generateUrl('app_main'));
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToCrud('Users', 'fa-solid fa-users', User::class);
        yield MenuItem::linkToCrud('Contractors', 'fa-solid fa-users', Contractor::class);
        // yield MenuItem::subMenu('User', 'fa-solid fa-users', User::class)->setSubItems([

        // ]);
        yield MenuItem::linkToCrud('Sites', 'fa-solid fa-location-dot', Lieu::class);
        yield MenuItem::linkToCrud('Site Type', 'fa-solid fa-location-dot', TypeLieu::class);
        yield MenuItem::linkToUrl('Profiler', 'fa-solid fa-circle-info', $this->generateUrl('_profiler_home'));
        yield MenuItem::linkToUrl('phpinfo', 'fa-solid fa-file-lines', $this->generateUrl('_profiler_phpinfo'));
        yield MenuItem::linkToUrl('Search Google', 'fab fa-google', 'https://google.com');
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }


    // public function configureUserMenu(UserInterface $user): UserMenu
    // {
    //     return parent::configureUserMenu()
    //     ->setAvatarUrl($user->getAvatarUrl);

    // }
}
