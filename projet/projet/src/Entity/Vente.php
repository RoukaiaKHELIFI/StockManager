<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VenteRepository;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 */
class Vente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
 


    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="ventes")
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modePaie;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_u;
  /**
 * @var \Date
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="date")
 */
public $createdAt;

/**
 * @ORM\ManyToMany(targetEntity=Produit::class, inversedBy="ventes")
 */
private $produits;

public function __construct()
{
    $this->produits = new ArrayCollection();
}
    public function getId(): ?int
    {
        return $this->id;
    }

  

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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

    public function getModePaie(): ?string
    {
        return $this->modePaie;
    }

    public function setModePaie(string $modePaie): self
    {
        $this->modePaie = $modePaie;

        return $this;
    }

    public function getPrixU(): ?float
    {
        return $this->prix_u;
    }

    public function setPrixU(float $prix_u): self
    {
        $this->prix_u = $prix_u;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        $this->produits->removeElement($produit);

        return $this;
    }
    public function __tostring(){
        return $this->nom;
    }

    
   

}
