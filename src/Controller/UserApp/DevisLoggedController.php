<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevisLoggedController extends AbstractController
{
    #[Route('/devis-logged', name: 'app_devis-logged')]
    public function index(): Response
    {
        return $this->render('user_app/devis-logged.html.twig', [
            'controller_name' => 'DevisLoggedController',
        ]);
    }
}
