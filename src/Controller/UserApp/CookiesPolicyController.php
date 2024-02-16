<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CookiesPolicyController extends AbstractController
{
    #[Route('/cookies-policy', name: 'app_cookies-policy')]
    public function index(): Response
    {
        return $this->render('user_app/cookies-policy.html.twig', [
            'controller_name' => 'CookiesPolicyController',
        ]);
    }
}
