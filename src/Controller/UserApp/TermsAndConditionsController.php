<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermsAndConditionsController extends AbstractController
{
    #[Route('/terms-and-conditions', name: 'app_terms-and-conditions')]
    public function index(): Response
    {
        return $this->render('user_app/terms-and-conditions.html.twig', [
            'controller_name' => 'TermsAndConditionsController',
        ]);
    }
}
