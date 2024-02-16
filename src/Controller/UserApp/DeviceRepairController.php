<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Reparation;
use App\Entity\Tarif;
use App\Entity\Modele;


class DeviceRepairController extends AbstractController
{
    #[Route('/device-repair/{idModele}', name: 'app_device-repair')]
    public function index(int $idModele, EntityManagerInterface $entityManager): Response
    {
        $tarifs = $entityManager->getRepository(Tarif::class)->findTarifsAndPannesByModele($idModele);
        $modele = $entityManager->getRepository(Modele::class)->find($idModele);

        return $this->render('user_app/device-repair.html.twig', [
            'controller_name' => 'DeviceRepairController',
            'tarifs' => $tarifs,
            'modele' => $modele,
        ]);
    }
}
