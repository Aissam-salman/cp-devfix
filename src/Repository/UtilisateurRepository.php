<?php
namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Ville;
use App\Entity\Role;


/**
 * @extends ServiceEntityRepository<Utilisateur>
 *
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class UtilisateurRepository extends ServiceEntityRepository
{
    private $entityManager;
    private $passwordHasherFactory;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager, PasswordHasherFactoryInterface $passwordHasherFactory)
    {
        parent::__construct($registry, Utilisateur::class);
        $this->entityManager = $entityManager;
        $this->passwordHasherFactory = $passwordHasherFactory;
    }

    public function insertUser(Request $request): ?Response
    {
        if ($request->isMethod('POST')) {

            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $mdp = $request->request->get('mdp');
            $numero = $request->request->get('numero');
            $adresse = $request->request->get('adresse');
            $complementAdresse = $request->request->get('complement_adresse');

            if ($nom === null || $prenom === null || $email === null || $mdp === null || $numero === null) {
                return new Response('Tous les champs requis doivent être renseignés.', Response::HTTP_BAD_REQUEST);
            }


            $utilisateur = new Utilisateur();
            $utilisateur->setNom($nom);
            $utilisateur->setPrenom($prenom);
            $utilisateur->setEmail($email);
            $utilisateur->setNumero($numero);
            $utilisateur->setAdresse($adresse);
            $utilisateur->setComplementAdresse($complementAdresse);
            $utilisateur->setDateCreationUtilisateur(new \DateTime());
            $utilisateur->setDateMajUtilisateur(new \DateTime());

            $villeRepository = $this->entityManager->getRepository(Ville::class);
            $ville = $villeRepository->find(2);
            if ($ville !== null) {
                $utilisateur->setIdVille($ville);
            } else {
                return new Response('La ville n\'a pas été trouvé.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $roleRepository = $this->entityManager->getRepository(Role::class);
            $role = $roleRepository->find(2);
            if ($role !== null) {
                $utilisateur->setIdRole($role);
            } else {
                return new Response('Le rôle par défaut n\'a pas été trouvé.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }


            $passwordHasher = $this->passwordHasherFactory->getPasswordHasher(Utilisateur::class);
            $hashedPassword = $passwordHasher->hash($mdp);
            $utilisateur->setMdp($hashedPassword);


            $this->entityManager->persist($utilisateur);
            $this->entityManager->flush();

            return new Response();
        }
    }

}
