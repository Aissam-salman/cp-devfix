<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    #[Route('/admin/client', name: 'admin_client')]
    public function index(): Response
    {
        return $this->render('admin_app/client/admin_client.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
