<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Parametre;
use Twig\Environment;

class TemplateVariableListener implements EventSubscriberInterface
{
    private $twig;
    private $entityManager;

    public function __construct(Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }

    public function onKernelController(ControllerEvent $event)
    {
        $parametre = $this->entityManager->getRepository(Parametre::class)->findOneBy([]);
        $this->twig->addGlobal('parametre', $parametre);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
