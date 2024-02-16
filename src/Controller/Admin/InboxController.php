<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InboxController extends AbstractController
{
    #[Route('/admin/inbox', name: 'admin_inbox')]
    public function index(): Response
    {
        return $this->render('admin_app/inbox/admin_inbox.html.twig', [
            'controller_name' => 'InboxController',
        ]);
    }
}
