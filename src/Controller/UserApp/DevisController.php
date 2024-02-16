<?php

namespace App\Controller\UserApp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tarif;
use App\Entity\Utilisateur;
use App\Entity\Appareil;
use App\Entity\Reparation;
use App\Entity\Devis;



class DevisController extends AbstractController
{
    #[Route('/devis', name: 'app_devis', methods: ['POST'])]
    public function showDevisForm(Request $request, EntityManagerInterface $entityManager): Response
    {
        $postData = $request->request->all();
        
        $tarifIds = $postData['tarifIds'] ?? [];
    
        $total = 0;
        $tarifs = [];

        foreach ($tarifIds as $tarifId) {
            $tarif = $entityManager->getRepository(Tarif::class)->find($tarifId);
            if ($tarif) {
                $total += $tarif->getMontant();
                $tarifs[] = $tarif;
            }
        }
    
        return $this->render('user_app/devis.html.twig', [
            'total' => $total,
            'tarifs' => $tarifs,
        ]);
    }
    

    #[Route('/create-devis', name: 'app_create_devis', methods: ['POST'])]
    public function createDevis(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        $postData = $request->request->all();
        $tarifIds = $postData['tarifIds'] ?? [];

        $lastDevis = $entityManager->getRepository(Devis::class)->findOneBy([], ['idDevis' => 'DESC']);
        $numDevis = $lastDevis ? 'DEV' . str_pad((substr($lastDevis->getNumDevis(), 3) + 1), 3, '0', STR_PAD_LEFT) : 'DEV001';

        $reparations = [];
        foreach ($tarifIds as $tarifId) {
            $tarif = $entityManager->getRepository(Tarif::class)->find($tarifId);


            // creer l'appareil une seule fois
            if ($tarif) {
                $modele = $tarif->getIdModele();
                $marque = $modele->getIdMarque();
                $typeAppareils = $marque->getidTypeAppareils();

                if (!$typeAppareils->isEmpty()) {
                    $typeAppareil = $typeAppareils->first();

                    $appareil = new Appareil();
                    $appareil->setCodeImei('null') // ajoute des input
                            ->setNumSerie('null') // ajoute des input
                            ->setDateCreationAppareil(new \DateTime())
                            ->setIdUtilisateur($user)
                            ->setIdModele($modele)
                            ->setIdTypeAppareil($typeAppareil);
                    $entityManager->persist($appareil);
                    $appareils[] = $appareil;
                }
            }

            // je doit get l'id de l'appareil lié l'user, le modele et le type d'appareil

            $appareilForReparation = end($appareils);

            if ($appareilForReparation) {
                $typePanne = $tarif->getIdPanne();
                $reparation = new Reparation();
                $reparation->setObservation($typePanne->getLibPanne())
                        ->setDateDemande(new \DateTime())
                        ->setDateMajDemande(new \DateTime())
                        ->setIdPanne($typePanne)
                        ->setIdAppareil($appareil)
                        ->setIdUtilisateur($user);
                $entityManager->persist($reparation);
                $reparations[] = $reparation;
            }

            // je doit get l'id de la reparation lié a l'appareil et l'user et le type de panne

            $reparationForDevis = end($reparations);

            if ($reparationForDevis) {
                $devis = new Devis();
                $devis->setNumDevis($numDevis)
                    ->setDateDevis(new \DateTime())
                    ->setPrixTtc($tarif->getMontant())
                    ->setCommentaireDevis($tarif->getIdPanne()->getLibPanne())
                    ->setDateRestitution(new \DateTime('+1 week'))
                    ->setStatut(0)
                    ->setDateMajDevis(new \DateTime())
                    ->setIdReparation($reparationForDevis)
                    ->setIdUtilisateur($user);
            
                $entityManager->persist($devis);
                $entityManager->flush();
            }
        }

        return $this->redirectToRoute('app_user-dashboard');
    }

}
