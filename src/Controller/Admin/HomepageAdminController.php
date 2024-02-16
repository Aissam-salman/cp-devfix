<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageAdminController extends AbstractController
{
    #[Route('/admin/homepage', name: 'homepage_admin')]
    public function index(): Response
    {
        return $this->render('admin_app/index.html.twig', [
            'controller_name' => 'HomepageAdminController',
            // 'admin' => true,
            // 'user' => false
        ]);
    }

}
