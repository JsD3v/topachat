<?php

namespace App\Controller\Admin;

use App\Entity\Alimentation;
use App\Entity\Cartegraphique;
use App\Entity\CarteMere;
use App\Entity\Certification;
use App\Entity\Chipset;
use App\Entity\Client;
use App\Entity\Configuration;
use App\Entity\Connecteur;
use App\Entity\ConnecteurCarteMere;
use App\Entity\Contact;
use App\Entity\Fabricant;
use App\Entity\Modularite;
use App\Entity\Processeur;
use App\Entity\Ram;
use App\Entity\Socket;
use App\Entity\Stockage;
use App\Entity\User;
use App\Entity\Ventirad;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
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
            ->setTitle('Topachat');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Configurateur PC');
        yield MenuItem::linkToCrud('Processeur', 'fas fa-microchip', Processeur::class);
        yield MenuItem::linkToCrud('Ram', 'fas fa-memory', Ram::class);
        yield MenuItem::linkToCrud('Carte mère', 'fas fa-tablet', CarteMere::class);
        yield MenuItem::linkToCrud('Ventirad', 'fas fa-desktop', Ventirad::class);
        yield MenuItem::linkToCrud('Carte graphique', 'fas fa-battery', Cartegraphique::class);
        yield MenuItem::linkToCrud('Stockage', 'fas fa-hdd', Stockage::class);
        yield MenuItem::linkToCrud('Alimentation','fas fa-id-badge', Alimentation::class );
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Contact', 'fas fa-paper-plane', Contact::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Client', 'fas fa-id-badge', Client::class);
        yield MenuItem::section('Gestion des composants');
        yield MenuItem::linkToCrud('Fabricant', 'fas fa-address-card', Fabricant::class);
        yield MenuItem::linkToCrud('Certifications', 'fas fa-award', Certification::class);
        yield MenuItem::linkToCrud('Connecteur carte mère', 'fas fa-plug', ConnecteurCarteMere::class);
        yield MenuItem::linkToCrud('Connecteur', 'fas fa-connectdevelop', Connecteur::class);
        yield MenuItem::linkToCrud('Modularité', 'fas fa-brain', Modularite::class);
        yield MenuItem::linkToCrud('Socket', 'fas fa-microchip', Socket::class);
        yield MenuItem::section('Gestion des composants');
        yield MenuItem::linkToCrud('PC configurés', 'fas fa-desktop', Configuration::class);
    }
}
