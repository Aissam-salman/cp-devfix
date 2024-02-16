<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;


/**
 * Marque
 *
 * @ORM\Table(name="marque")
 * @ORM\Entity(repositoryClass= "App\Repository\MarqueRepository")
 */
class Marque
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_marque", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMarque;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_marque", type="string", length=150, nullable=false)
     */
    private $libMarque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo_marque", type="string", length=150, nullable=true)
     */
    private $logoMarque;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TypeAppareil", inversedBy="idTypeAppareil")
     * @ORM\JoinTable(name="contenir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_marque", referencedColumnName="id_marque")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_type_appareil", referencedColumnName="id_type_appareil")
     *   }
     * )
     */
    private $idTypeAppareils = array();

    public function getIdMarque(): ?int
    {
        return $this->idMarque;
    }

    public function getLibMarque(): ?string
    {
        return $this->libMarque;
    }

    public function setLibMarque(string $libMarque): static
    {
        $this->libMarque = $libMarque;

        return $this;
    }

    public function getLogoMarque(): ?string
    {
        return $this->logoMarque;
    }

    public function setLogoMarque(?string $logoMarque): static
    {
        $this->logoMarque = $logoMarque;

        return $this;
    }

    /**
     * @return Collection<int, TypeAppareil>
     */
    public function getidTypeAppareils(): Collection
    {
        return $this->idTypeAppareils;
    }

    public function addidTypeAppareil(TypeAppareil $idTypeAppareil): static
    {
        if (!$this->idTypeAppareils->contains($idTypeAppareil)) {
            $this->idTypeAppareils->add($idTypeAppareil);
        }

        return $this;
    }

    public function removeidTypeAppareil(TypeAppareil $idTypeAppareil): static
    {
        $this->idTypeAppareils->removeElement($idTypeAppareil);

        return $this;
    }
}