<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAppareil
 *
 * @ORM\Table(name="type_appareil")
 * @ORM\Entity(repositoryClass= "App\Repository\TypeAppareilRepository")
 */
class TypeAppareil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_appareil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeAppareil;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_type_appareil", type="string", length=50, nullable=false)
     */
    private $libTypeAppareil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_type_appareil", type="string", length=100, nullable=true)
     */
    private $imgTypeAppareil;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Marque", inversedBy="idTypeAppareil")
     * @ORM\JoinTable(name="contenir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_type_appareil", referencedColumnName="id_type_appareil")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_marque", referencedColumnName="id_marque")
     *   }
     * )
     */
    private $idMarques = array();

    public function getIdTypeAppareil(): ?int
    {
        return $this->idTypeAppareil;
    }

    public function getLibTypeAppareil(): ?string
    {
        return $this->libTypeAppareil;
    }

    public function setLibTypeAppareil(string $libTypeAppareil): static
    {
        $this->libTypeAppareil = $libTypeAppareil;

        return $this;
    }

    public function getImgTypeAppareil(): ?string
    {
        return $this->imgTypeAppareil;
    }

    public function setImgTypeAppareil(?string $imgTypeAppareil): static
    {
        $this->imgTypeAppareil = $imgTypeAppareil;

        return $this;
    }

    /**
     * @return Collection<int, Marque>
     */
    public function getIdMarques(): Collection
    {
        return $this->idMarques;
    }

    public function addIdMarque(Marque $idMarque): static
    {
        if (!$this->idMarques->contains($idMarque)) {
            $this->idMarques->add($idMarque);
        }

        return $this;
    }

    public function removeIdMarque(Marque $idMarque): static
    {
        $this->idMarques->removeElement($idMarque);

        return $this;
    }
}