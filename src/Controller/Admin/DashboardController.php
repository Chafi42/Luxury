<?php

namespace App\Controller\Admin;

use App\Entity\Apply;
use App\Entity\Candidate;
use App\Entity\Client;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\JobOffer;
use App\Entity\Media;
use App\Entity\Status;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Bundle\MakerBundle\Doctrine\EntityClassGenerator;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

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
            ->setTitle('Luxury Services');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Candidate', 'fa-solid fa-users', Candidate::class);
        yield MenuItem::linkToCrud('Apply', 'fa-solid fa-user-plus', Apply::class);
        yield MenuItem::linkToCrud('Category', 'fa-solid fa-layer-group', Status::class);
        yield MenuItem::linkToCrud('Experience', 'fa-solid fa-box-open', Experience::class);
        yield MenuItem::linkToCrud('Client', 'fa-solid fa-hand-fist', Client::class);
        yield MenuItem::linkToCrud('Gender', 'fa-solid fa-venus-mars', Gender::class);
        yield MenuItem::linkToCrud('Status', 'fa-solid fa-battery-full', Status::class);
        yield MenuItem::linkToCrud('Job Offer', 'fa-solid fa-battery-full', JobOffer::class);
        yield MenuItem::linkToCrud('Files', 'fa-solid fa-images', Media::class);
    }
}
