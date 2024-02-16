<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 *
 * @ORM\Table(name="modele", indexes={@ORM\Index(name="modele_marque_FK", columns={"id_marque"})})
 * @ORM\Entity(repositoryClass= "App\Repository\ModeleRepository")
 */
class Modele
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_modele", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModele;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_modele", type="string", length=150, nullable=false)
     */
    private $libModele;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_modele", type="string", length=5, nullable=true)
     */
    private $imgModele;

    /**
     * @var \Marque
     *
     * @ORM\ManyToOne(targetEntity="Marque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_marque", referencedColumnName="id_marque")
     * })
     */
    private $idMarque;

    public function getIdModele(): ?int
    {
        return $this->idModele;
    }

    public function getLibModele(): ?string
    {
        return $this->libModele;
    }

    public function setLibModele(string $libModele): static
    {
        $this->libModele = $libModele;

        return $this;
    }

    public function getImgModele(): ?string
    {
        return $this->imgModele;
    }

    public function setImgModele(?string $imgModele): static
    {
        $this->imgModele = $imgModele;

        return $this;
    }

    public function getIdMarque(): ?Marque
    {
        return $this->idMarque;
    }

    public function setIdMarque(?Marque $idMarque): static
    {
        $this->idMarque = $idMarque;

        return $this;
    }


}
