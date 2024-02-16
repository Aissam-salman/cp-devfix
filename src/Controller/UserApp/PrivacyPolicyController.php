<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyPolicyController extends AbstractController
{
    #[Route('/privacy-policy', name: 'app_privacy-policy')]
    public function index(): Response
    {
        return $this->render('user_app/privacy-policy.html.twig', [
            'controller_name' => 'PrivacyPolicyController',
        ]);
    }
}
