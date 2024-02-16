<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Alerte
 *
 * @ORM\Table(name="alerte", indexes={@ORM\Index(name="alerte_devis0_FK", columns={"id_devis"}), @ORM\Index(name="alerte_utilisateur_FK", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass= "App\Repository\AlerteRepository")
 */
class Alerte
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_alerte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAlerte;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_alerte", type="string", length=100, nullable=false)
     */
    private $titreAlerte;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_alerte", type="text", length=65535, nullable=false)
     */
    private $contenuAlerte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_alerte", type="datetime", nullable=false)
     */
    private $dateAlerte;

    /**
     * @var \Devis
     *
     * @ORM\ManyToOne(targetEntity="Devis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_devis", referencedColumnName="id_devis")
     * })
     */
    private $idDevis;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdAlerte(): ?int
    {
        return $this->idAlerte;
    }

    public function getTitreAlerte(): ?string
    {
        return $this->titreAlerte;
    }

    public function setTitreAlerte(string $titreAlerte): static
    {
        $this->titreAlerte = $titreAlerte;

        return $this;
    }

    public function getContenuAlerte(): ?string
    {
        return $this->contenuAlerte;
    }

    public function setContenuAlerte(string $contenuAlerte): static
    {
        $this->contenuAlerte = $contenuAlerte;

        return $this;
    }

    public function getDateAlerte(): ?\DateTimeInterface
    {
        return $this->dateAlerte;
    }

    public function setDateAlerte(\DateTimeInterface $dateAlerte): static
    {
        $this->dateAlerte = $dateAlerte;

        return $this;
    }

    public function getIdDevis(): ?Devis
    {
        return $this->idDevis;
    }

    public function setIdDevis(?Devis $idDevis): static
    {
        $this->idDevis = $idDevis;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): static
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
