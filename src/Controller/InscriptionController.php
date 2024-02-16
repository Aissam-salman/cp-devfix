<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Reparation;
use App\Entity\Devis;
use App\Entity\Appareil;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Tarif;


class InscriptionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository)
    {
        $this->entityManager = $entityManager;
        $this->utilisateurRepository = $utilisateurRepository;
    }

    #[Route('/inscription', name: 'app_inscription', methods: ['POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $this->utilisateurRepository->insertUser($request);
            return $this->redirectToRoute('app_homepage');
        }
        return $this->render('inscription/inscription.html.twig');
    }
}
