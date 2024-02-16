<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MarqueController extends AbstractController
{
    #[Route('/admin/marque', name: 'admin_marque')]
    public function index(): Response
    {
        return $this->render('admin_app/marque/admin_marque.html.twig', [
            'controller_name' => 'MarqueController',
        ]);
    }
}
