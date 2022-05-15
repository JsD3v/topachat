<?php

namespace App\Controller;

use App\Entity\Configuration;
use App\Form\ConfigurationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(Request $request): Response
    {
        $configuration = new Configuration();

        $configuration = $this ->createForm(ConfigurationFormType::class, $configuration);
        $configuration->handleRequest($request);

        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'form'=>$configuration->createView()
        ]);
    }
}
