<?php

namespace App\Entity;

use App\Entity\Produit;
use App\Entity\Fournisseur;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AchatsRepository;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * @ORM\Entity(repositoryClass=AchatsRepository::class)
 */
class Achats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\Column(type="integer")
     */
    private $cout;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="float")
     */
    private $sousTotal;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $remise;

    /**
     * @ORM\Column(type="float")
     */
    private $totalNet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modePaie;

    /**
     * @ORM\Column(type="float")
     */
    private $paye;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="achats")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="achats")
     */
    private $fournisseurs;

  /**
 * @var \Date
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="date")
 */
public $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getSousTotal(): ?float
    {
        return $this->sousTotal;
    }

    public function setSousTotal(float $sousTotal): self
    {
        $this->sousTotal = $sousTotal;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(int $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getTotalNet(): ?float
    {
        return $this->totalNet;
    }

    public function setTotalNet(float $totalNet): self
    {
        $this->totalNet = $totalNet;

        return $this;
    }

    public function getModePaie(): ?string
    {
        return $this->modePaie;
    }

    public function setModePaie(string $modePaie): self
    {
        $this->modePaie = $modePaie;

        return $this;
    }

    public function getPaye(): ?float
    {
        return $this->paye;
    }

    public function setPaye(float $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
    public function getFournisseurs(): ?Fournisseur
    {
        return $this->fournisseurs;
    }

    public function setFournisseurs(?Fournisseur $fournisseurs): self
    {
        $this->fournisseurs = $fournisseurs;

        return $this;
    }


   
}
