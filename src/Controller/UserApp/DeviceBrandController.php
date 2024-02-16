<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TypeAppareilRepository;

class DeviceBrandController extends AbstractController
{
    #[Route('/device-brand/{idTypeAppareil}', name: 'app_device-brand')]
    public function index(TypeAppareilRepository $typeAppareilRepository, $idTypeAppareil): Response
    {
        $marques = $typeAppareilRepository->findMarquesByTypeAppareil($idTypeAppareil);

        return $this->render('user_app/device-brand.html.twig', [
            'controller_name' => 'DeviceBrandController',
            'brands' => $marques,
        ]);
    }
}