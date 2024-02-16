<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{
    #[Route('/admin/team', name: 'admin_team')]
    public function index(): Response
    {
        return $this->render('admin_app/team/admin_team.html.twig', [
            'controller_name' => 'TeamController',
        ]);
    }
}
