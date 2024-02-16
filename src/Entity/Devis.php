<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis", indexes={@ORM\Index(name="devis_reparation_FK", columns={"id_reparation"}), @ORM\Index(name="devis_utilisateur0_FK", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass= "App\Repository\DevisRepository")
 */
class Devis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_devis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDevis;

    /**
     * @var string
     *
     * @ORM\Column(name="num_devis", type="string", length=50, nullable=false)
     */
    private $numDevis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_devis", type="datetime", nullable=false)
     */
    private $dateDevis;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_ttc", type="decimal", precision=15, scale=3, nullable=false)
     */
    private $prixTtc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_devis", type="text", length=65535, nullable=true)
     */
    private $commentaireDevis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_restitution", type="date", nullable=false)
     */
    private $dateRestitution;

    /**
     * @var int
     *
     * @ORM\Column(name="statut", type="integer", nullable=false)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj_devis", type="datetime", nullable=false)
     */
    private $dateMajDevis;

    /**
     * @var \Reparation
     *
     * @ORM\ManyToOne(targetEntity="Reparation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reparation", referencedColumnName="id_reparation")
     * })
     */
    private $idReparation;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pieces", inversedBy="idDevis")
     * @ORM\JoinTable(name="composer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_devis", referencedColumnName="id_devis")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_pieces", referencedColumnName="id_pieces")
     *   }
     * )
     */
    private $idPieces = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPieces = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdDevis(): ?int
    {
        return $this->idDevis;
    }

    public function getNumDevis(): ?string
    {
        return $this->numDevis;
    }

    public function setNumDevis(string $numDevis): static
    {
        $this->numDevis = $numDevis;

        return $this;
    }

    public function getDateDevis(): ?\DateTimeInterface
    {
        return $this->dateDevis;
    }

    public function setDateDevis(\DateTimeInterface $dateDevis): static
    {
        $this->dateDevis = $dateDevis;

        return $this;
    }

    public function getPrixTtc(): ?string
    {
        return $this->prixTtc;
    }

    public function setPrixTtc(string $prixTtc): static
    {
        $this->prixTtc = $prixTtc;

        return $this;
    }

    public function getCommentaireDevis(): ?string
    {
        return $this->commentaireDevis;
    }

    public function setCommentaireDevis(?string $commentaireDevis): static
    {
        $this->commentaireDevis = $commentaireDevis;

        return $this;
    }

    public function getDateRestitution(): ?\DateTimeInterface
    {
        return $this->dateRestitution;
    }

    public function setDateRestitution(\DateTimeInterface $dateRestitution): static
    {
        $this->dateRestitution = $dateRestitution;

        return $this;
    }

    public function isStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateMajDevis(): ?\DateTimeInterface
    {
        return $this->dateMajDevis;
    }

    public function setDateMajDevis(\DateTimeInterface $dateMajDevis): static
    {
        $this->dateMajDevis = $dateMajDevis;

        return $this;
    }

    public function getIdReparation(): ?Reparation
    {
        return $this->idReparation;
    }

    public function setIdReparation(?Reparation $idReparation): static
    {
        $this->idReparation = $idReparation;

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

    /**
     * @return Collection<int, Pieces>
     */
    public function getIdPieces(): Collection
    {
        return $this->idPieces;
    }

    public function addIdPiece(Pieces $idPiece): static
    {
        if (!$this->idPieces->contains($idPiece)) {
            $this->idPieces->add($idPiece);
        }

        return $this;
    }

    public function removeIdPiece(Pieces $idPiece): static
    {
        $this->idPieces->removeElement($idPiece);

        return $this;
    }

}
