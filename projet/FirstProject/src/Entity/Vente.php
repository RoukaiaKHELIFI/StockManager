<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ventes")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="ventes")
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

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
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
}
