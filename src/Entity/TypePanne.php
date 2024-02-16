<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePanne
 *
 * @ORM\Table(name="type_panne")
 * @ORM\Entity(repositoryClass= "App\Repository\TypePanneRepository")
 */
class TypePanne
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_panne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPanne;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_panne", type="string", length=150, nullable=false)
     */
    private $libPanne;

    /**
     * @var string
     *
     * @ORM\Column(name="img_panne", type="string", length=40, nullable=true)
     */
    private $imgPanne;

    public function getIdPanne(): ?int
    {
        return $this->idPanne;
    }

    public function getLibPanne(): ?string
    {
        return $this->libPanne;
    }

    public function setLibPanne(string $libPanne): static
    {
        $this->libPanne = $libPanne;

        return $this;
    }

    public function getImgPanne(): ?string
    {
        return $this->imgPanne;
    }

    public function setImgPanne(?string $imgPanne): static
    {
        $this->imgPanne = $imgPanne;

        return $this;
    }


}
