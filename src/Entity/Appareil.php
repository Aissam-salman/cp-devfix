<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Appareil
 *
 * @ORM\Table(name="appareil", indexes={@ORM\Index(name="Appareil_modele0_FK", columns={"id_modele"}), @ORM\Index(name="Appareil_type_appareil1_FK", columns={"id_type_appareil"}), @ORM\Index(name="Appareil_utilisateur_FK", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass= "App\Repository\AppareilRepository")
 */
class Appareil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_appareil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAppareil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_imei", type="string", length=100, nullable=true)
     */
    private $codeImei;

    /**
     * @var string
     *
     * @ORM\Column(name="num_serie", type="string", length=100, nullable=false)
     */
    private $numSerie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_appareil", type="datetime", nullable=false)
     */
    private $dateCreationAppareil;

    /**
     * @var \Modele
     *
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modele", referencedColumnName="id_modele")
     * })
     */
    private $idModele;

    /**
     * @var \TypeAppareil
     *
     * @ORM\ManyToOne(targetEntity="TypeAppareil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_appareil", referencedColumnName="id_type_appareil")
     * })
     */
    private $idTypeAppareil;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdAppareil(): ?int
    {
        return $this->idAppareil;
    }

    public function getCodeImei(): ?string
    {
        return $this->codeImei;
    }

    public function setCodeImei(?string $codeImei): static
    {
        $this->codeImei = $codeImei;

        return $this;
    }

    public function getNumSerie(): ?string
    {
        return $this->numSerie;
    }

    public function setNumSerie(string $numSerie): static
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getDateCreationAppareil(): ?\DateTimeInterface
    {
        return $this->dateCreationAppareil;
    }

    public function setDateCreationAppareil(\DateTimeInterface $dateCreationAppareil): static
    {
        $this->dateCreationAppareil = $dateCreationAppareil;

        return $this;
    }

    public function getIdModele(): ?Modele
    {
        return $this->idModele;
    }

    public function setIdModele(?Modele $idModele): static
    {
        $this->idModele = $idModele;

        return $this;
    }

    public function getIdTypeAppareil(): ?TypeAppareil
    {
        return $this->idTypeAppareil;
    }

    public function setIdTypeAppareil(?TypeAppareil $idTypeAppareil): static
    {
        $this->idTypeAppareil = $idTypeAppareil;

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
