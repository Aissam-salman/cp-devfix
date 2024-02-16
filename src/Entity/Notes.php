<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes", indexes={@ORM\Index(name="notes_modele_FK", columns={"id_modele"})})
 * @ORM\Entity(repositoryClass= "App\Repository\NotesRepository")
 */
class Notes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_notes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotes;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_notes", type="string", length=100, nullable=false)
     */
    private $titreNotes;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text", length=65535, nullable=false)
     */
    private $commentaires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_note", type="datetime", nullable=false)
     */
    private $dateCreationNote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj_note", type="datetime", nullable=false)
     */
    private $dateMajNote;

    /**
     * @var \Modele
     *
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modele", referencedColumnName="id_modele")
     * })
     */
    private $idModele;

    public function getIdNotes(): ?int
    {
        return $this->idNotes;
    }

    public function getTitreNotes(): ?string
    {
        return $this->titreNotes;
    }

    public function setTitreNotes(string $titreNotes): static
    {
        $this->titreNotes = $titreNotes;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): static
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getDateCreationNote(): ?\DateTimeInterface
    {
        return $this->dateCreationNote;
    }

    public function setDateCreationNote(\DateTimeInterface $dateCreationNote): static
    {
        $this->dateCreationNote = $dateCreationNote;

        return $this;
    }

    public function getDateMajNote(): ?\DateTimeInterface
    {
        return $this->dateMajNote;
    }

    public function setDateMajNote(\DateTimeInterface $dateMajNote): static
    {
        $this->dateMajNote = $dateMajNote;

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


}
