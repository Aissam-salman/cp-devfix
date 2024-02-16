<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $phone = $request->request->get('cell_phone');
            $email = $request->request->get('email');
            $subject = $request->request->get('subject');
            $message = $request->request->get('message');

            $email = (new Email())
                ->from($email)
                ->to('anthony9419@outlook.fr')
                ->subject('Nouveau message de contact : ' . $subject)
                ->text($message);

            try {
                $mailer->send($email);

                $this->addFlash('success', 'Email envoyé avec succès!');
                return $this->redirectToRoute('app_homepage');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('error', 'Erreur lors de lenvoi de lemail: ' . $e->getMessage());
            }
        }

        return $this->render('user_app/contact.html.twig');
    }
}