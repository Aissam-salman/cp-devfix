<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reparation
 *
 * @ORM\Table(name="reparation", indexes={@ORM\Index(name="reparation_Appareil0_FK", columns={"id_appareil"}), @ORM\Index(name="reparation_statut1_FK", columns={"id_statut"}), @ORM\Index(name="reparation_type_panne_FK", columns={"id_panne"}), @ORM\Index(name="reparation_utilisateur2_FK", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass= "App\Repository\ReparationRepository")
 */
class Reparation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reparation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReparation;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="text", length=65535, nullable=false)
     */
    private $observation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="datetime", nullable=false)
     */
    private $dateDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj_demande", type="datetime", nullable=false)
     */
    private $dateMajDemande;

    /**
     * @var \Appareil
     *
     * @ORM\ManyToOne(targetEntity="Appareil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_appareil", referencedColumnName="id_appareil")
     * })
     */
    private $idAppareil;


    /**
     * @var \TypePanne
     *
     * @ORM\ManyToOne(targetEntity="TypePanne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_panne", referencedColumnName="id_panne")
     * })
     */
    private $idPanne;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdReparation(): ?int
    {
        return $this->idReparation;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): static
    {
        $this->observation = $observation;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): static
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getDateMajDemande(): ?\DateTimeInterface
    {
        return $this->dateMajDemande;
    }

    public function setDateMajDemande(\DateTimeInterface $dateMajDemande): static
    {
        $this->dateMajDemande = $dateMajDemande;

        return $this;
    }

    public function getIdAppareil(): ?Appareil
    {
        return $this->idAppareil;
    }

    public function setIdAppareil(?Appareil $idAppareil): static
    {
        $this->idAppareil = $idAppareil;

        return $this;
    }

    public function getIdPanne(): ?TypePanne
    {
        return $this->idPanne;
    }

    public function setIdPanne(?TypePanne $idPanne): static
    {
        $this->idPanne = $idPanne;

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
