<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass= "App\Repository\RoleRepository")
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_role", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRole;

    /**
     * @var string
     *
     * @ORM\Column(name="code_role", type="string", length=50, nullable=false)
     */
    private $codeRole;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_role", type="string", length=50, nullable=false)
     */
    private $libelleRole;

    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    public function getCodeRole(): ?string
    {
        return $this->codeRole;
    }

    public function setCodeRole(string $codeRole): static
    {
        $this->codeRole = $codeRole;

        return $this;
    }

    public function getLibelleRole(): ?string
    {
        return $this->libelleRole;
    }

    public function setLibelleRole(string $libelleRole): static
    {
        $this->libelleRole = $libelleRole;

        return $this;
    }


}
