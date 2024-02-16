<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalMentionsController extends AbstractController
{
    #[Route('/legal-mentions', name: 'app_legal-mentions')]
    public function index(): Response
    {
        return $this->render('user_app/legal-mentions.html.twig', [
            'controller_name' => 'LegalMentionsController',
        ]);
    }
}
