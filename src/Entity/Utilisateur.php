<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="utilisateur_role_FK", columns={"id_role"}), @ORM\Index(name="utilisateur_ville0_FK", columns={"id_ville"})})
 * @ORM\Entity(repositoryClass= "App\Repository\UtilisateurRepository")
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface, PasswordHasherAwareInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=150, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=20, nullable=false)
     */
    private $numero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="complement_adresse", type="string", length=50, nullable=true)
     */
    private $complementAdresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_utilisateur", type="datetime", nullable=false)
     */
    private $dateCreationUtilisateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj_utilisateur", type="datetime", nullable=false)
     */
    private $dateMajUtilisateur;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id_role")
     * })
     */
    private $idRole;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ville", referencedColumnName="id_ville")
     * })
     */
    private $idVille;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): static
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getDateCreationUtilisateur(): ?\DateTimeInterface
    {
        return $this->dateCreationUtilisateur;
    }

    public function setDateCreationUtilisateur(\DateTimeInterface $dateCreationUtilisateur): static
    {
        $this->dateCreationUtilisateur = $dateCreationUtilisateur;

        return $this;
    }

    public function getDateMajUtilisateur(): ?\DateTimeInterface
    {
        return $this->dateMajUtilisateur;
    }

    public function setDateMajUtilisateur(\DateTimeInterface $dateMajUtilisateur): static
    {
        $this->dateMajUtilisateur = $dateMajUtilisateur;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->idRole;
    }

    public function setIdRole(?Role $idRole): static
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): static
    {
        $this->idVille = $idVille;

        return $this;
    }


     //--------- UserInterface

    /**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = [];


        if ($this->idRole !== null) {

            if ($this->idRole->getIdRole() === 1) {
                $roles[] = 'ROLE_ADMIN';
            } else {
                $roles[] = 'ROLE_USER';
            }
        }

        return $roles;
    }

    /**
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->mdp;
    }

    public function getPasswordHasherName(): ?string
    {
        return null;
    }


}




