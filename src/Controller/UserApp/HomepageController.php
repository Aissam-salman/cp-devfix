<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeAppareil;
use Doctrine\ORM\EntityManagerInterface;

class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'app_homepage')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $typeAppareils = $entityManager->getRepository(TypeAppareil::class)->findAll();

        return $this->render('user_app/homepage.html.twig', [
            'typeAppareils' => $typeAppareils,
        ]);
    }
}
