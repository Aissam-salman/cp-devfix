<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ModeleController extends AbstractController
{
    #[Route('/admin/modele', name: 'admin_modele')]
    public function index(): Response
    {
        return $this->render('admin_app/modele/admin_modele.html.twig', [
            'controller_name' => 'ModeleController',
        ]);
    }
}
