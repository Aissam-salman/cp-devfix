<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PiecesController extends AbstractController
{
    #[Route('/admin/pieces', name: 'admin_pieces')]
    public function index(): Response
    {
        return $this->render('admin_app/pieces/admin_piece.html.twig', [
            'controller_name' => 'PiecesController',
        ]);
    }
}
