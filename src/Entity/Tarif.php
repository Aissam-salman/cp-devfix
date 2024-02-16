<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif", indexes={@ORM\Index(name="tarif_modele0_FK", columns={"id_modele"}), @ORM\Index(name="tarif_type_panne_FK", columns={"id_panne"})})
 * @ORM\Entity(repositoryClass= "App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tarif", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTarif;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal", precision=15, scale=3, nullable=false)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj_tarif", type="datetime", nullable=false)
     */
    private $dateMajTarif;

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
     * @var \TypePanne
     *
     * @ORM\ManyToOne(targetEntity="TypePanne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_panne", referencedColumnName="id_panne")
     * })
     */
    private $idPanne;

    public function getIdTarif(): ?int
    {
        return $this->idTarif;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateMajTarif(): ?\DateTimeInterface
    {
        return $this->dateMajTarif;
    }

    public function setDateMajTarif(\DateTimeInterface $dateMajTarif): static
    {
        $this->dateMajTarif = $dateMajTarif;

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

    public function getIdPanne(): ?TypePanne
    {
        return $this->idPanne;
    }

    public function setIdPanne(?TypePanne $idPanne): static
    {
        $this->idPanne = $idPanne;

        return $this;
    }


}
