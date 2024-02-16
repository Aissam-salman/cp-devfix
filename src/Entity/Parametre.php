<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametre
 *
 * @ORM\Table(name="parametre")
 * @ORM\Entity(repositoryClass= "App\Repository\ParametreRepository")
 */
class Parametre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_parametre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParametre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_entreprise", type="string", length=50, nullable=false)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="siren", type="string", length=50, nullable=false)
     */
    private $siren;

    /**
     * @var string
     *
     * @ORM\Column(name="code_tva", type="string", length=50, nullable=false)
     */
    private $codeTva;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_entreprise", type="string", length=50, nullable=false)
     */
    private $adresseEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="email_entreprise", type="string", length=50, nullable=false)
     */
    private $emailEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_entreprise", type="string", length=50, nullable=false)
     */
    private $telephoneEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur_primaire_entreprise", type="string", length=30, nullable=false)
     */
    private $couleurPrimaireEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_entreprise", type="string", length=30, nullable=false)
     */
    private $logoEntreprise;

    public function getIdParametre(): ?int
    {
        return $this->idParametre;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): static
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): static
    {
        $this->siren = $siren;

        return $this;
    }

    public function getCodeTva(): ?string
    {
        return $this->codeTva;
    }

    public function setCodeTva(string $codeTva): static
    {
        $this->codeTva = $codeTva;

        return $this;
    }

    public function getAdresseEntreprise(): ?string
    {
        return $this->adresseEntreprise;
    }

    public function setAdresseEntreprise(string $adresseEntreprise): static
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }

    public function getEmailEntreprise(): ?string
    {
        return $this->emailEntreprise;
    }

    public function setEmailEntreprise(string $emailEntreprise): static
    {
        $this->emailEntreprise = $emailEntreprise;

        return $this;
    }

    public function getTelephoneEntreprise(): ?string
    {
        return $this->telephoneEntreprise;
    }

    public function setTelephoneEntreprise(string $telephoneEntreprise): static
    {
        $this->telephoneEntreprise = $telephoneEntreprise;

        return $this;
    }

    public function getCouleurPrimaireEntreprise(): ?string
    {
        return $this->couleurPrimaireEntreprise;
    }

    public function setCouleurPrimaireEntreprise(string $couleurPrimaireEntreprise): static
    {
        $this->couleurPrimaireEntreprise = $couleurPrimaireEntreprise;

        return $this;
    }

    public function getLogoEntreprise(): ?string
    {
        return $this->logoEntreprise;
    }

    public function setLogoEntreprise(string $logoEntreprise): static
    {
        $this->logoEntreprise = $logoEntreprise;

        return $this;
    }


}
