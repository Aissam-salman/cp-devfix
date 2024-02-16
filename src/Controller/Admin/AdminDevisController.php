<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminDevisController extends AbstractController
{
    #[Route('/admin/devis', name: 'admin_devis')]
    public function index(): Response
    {
        return $this->render('admin_app/devis/admin_devis.html.twig', [
            'controller_name' => 'AdminDevisController',
        ]);
    }
}
