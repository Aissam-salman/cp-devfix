<?php

namespace App\Controller\UserApp;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\DevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UserDashboardController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/user-dashboard', name: 'app_user-dashboard')]
    public function index(Request $request, DevisRepository $devisRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(UtilisateurType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été mises à jour avec succès.');

            return $this->redirectToRoute('app_user-dashboard');
        }

        $devis = $devisRepository->findBy(['idUtilisateur' => $user]);

        return $this->render('user_app/user-dashboard.html.twig', [
            'controller_name' => 'UserDashboardController',
            'form' => $form->createView(),
            'devis' => $devis,
        ]);
    }
}
