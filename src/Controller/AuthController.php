<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AuthController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/connexion', name: 'app_auth')]
    public function index(): Response
    {
        $user = $this->security->getUser();
        if ($user) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {

                return $this->redirectToRoute('homepage_admin');
            } elseif (in_array('ROLE_USER', $user->getRoles())) {
                return $this->redirectToRoute('app_user-dashboard');
            }
        }
        return $this->redirectToRoute('app_homepage');
    }

    #[Route('/deconnexion', name: 'app_auth_deco')]
    public function deconnexion(): Response
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }
}