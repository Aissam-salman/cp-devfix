<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pieces
 *
 * @ORM\Table(name="pieces", indexes={@ORM\Index(name="pieces_modele_FK", columns={"id_modele"})})
 * @ORM\Entity(repositoryClass= "App\Repository\PiecesRepository")
 */
class Pieces
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pieces", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPieces;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_pieces", type="string", length=150, nullable=false)
     */
    private $libPieces;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_fabricant", type="string", length=150, nullable=false)
     */
    private $refFabricant;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="img_piece", type="string", length=50, nullable=false)
     */
    private $imgPiece;

    /**
     * @var int
     *
     * @ORM\Column(name="delai_livraison_pieces", type="integer", nullable=false)
     */
    private $delaiLivraisonPieces;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_pieces_ttc", type="decimal", precision=15, scale=3, nullable=false)
     */
    private $prixPiecesTtc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_pieces", type="datetime", nullable=false)
     */
    private $dateCreationPieces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj_pieces", type="datetime", nullable=false)
     */
    private $dateMajPieces;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Devis", mappedBy="idPieces")
     */
    private $idDevis = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idDevis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdPieces(): ?int
    {
        return $this->idPieces;
    }

    public function getLibPieces(): ?string
    {
        return $this->libPieces;
    }

    public function setLibPieces(string $libPieces): static
    {
        $this->libPieces = $libPieces;

        return $this;
    }

    public function getRefFabricant(): ?string
    {
        return $this->refFabricant;
    }

    public function setRefFabricant(string $refFabricant): static
    {
        $this->refFabricant = $refFabricant;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImgPiece(): ?string
    {
        return $this->imgPiece;
    }

    public function setImgPiece(string $imgPiece): static
    {
        $this->imgPiece = $imgPiece;

        return $this;
    }

    public function getDelaiLivraisonPieces(): ?int
    {
        return $this->delaiLivraisonPieces;
    }

    public function setDelaiLivraisonPieces(int $delaiLivraisonPieces): static
    {
        $this->delaiLivraisonPieces = $delaiLivraisonPieces;

        return $this;
    }

    public function getPrixPiecesTtc(): ?string
    {
        return $this->prixPiecesTtc;
    }

    public function setPrixPiecesTtc(string $prixPiecesTtc): static
    {
        $this->prixPiecesTtc = $prixPiecesTtc;

        return $this;
    }

    public function getDateCreationPieces(): ?\DateTimeInterface
    {
        return $this->dateCreationPieces;
    }

    public function setDateCreationPieces(\DateTimeInterface $dateCreationPieces): static
    {
        $this->dateCreationPieces = $dateCreationPieces;

        return $this;
    }

    public function getDateMajPieces(): ?\DateTimeInterface
    {
        return $this->dateMajPieces;
    }

    public function setDateMajPieces(\DateTimeInterface $dateMajPieces): static
    {
        $this->dateMajPieces = $dateMajPieces;

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

    /**
     * @return Collection<int, Devis>
     */
    public function getIdDevis(): Collection
    {
        return $this->idDevis;
    }

    public function addIdDevi(Devis $idDevi): static
    {
        if (!$this->idDevis->contains($idDevi)) {
            $this->idDevis->add($idDevi);
            $idDevi->addIdPiece($this);
        }

        return $this;
    }

    public function removeIdDevi(Devis $idDevi): static
    {
        if ($this->idDevis->removeElement($idDevi)) {
            $idDevi->removeIdPiece($this);
        }

        return $this;
    }

}
