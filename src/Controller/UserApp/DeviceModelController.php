<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Modele;

class DeviceModelController extends AbstractController
{
    #[Route('/device-model/{idMarque}', name: 'app_device-model')]
    public function index(int $idMarque, EntityManagerInterface $entityManager): Response
    {
        $modeles = $entityManager->getRepository(Modele::class)->findBy(['idMarque' => $idMarque]);

        return $this->render('user_app/device-model.html.twig', [
            'modeles' => $modeles,
        ]);
    }
}
