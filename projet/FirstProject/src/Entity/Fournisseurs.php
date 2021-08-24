<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseursRepository::class)
 */
class Fournisseurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom_entreprise;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $acount_n;

    /**
     * @ORM\OneToMany(targetEntity=Achats::class, mappedBy="fournisseurs")
     */
    private $achats;

    public function __construct()
    {
        $this->achats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }

    public function getAcountN(): ?int
    {
        return $this->acount_n;
    }

    public function setAcountN(?int $acount_n): self
    {
        $this->acount_n = $acount_n;

        return $this;
    }

    /**
     * @return Collection|Achats[]
     */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Achats $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats[] = $achat;
            $achat->setFournisseurs($this);
        }

        return $this;
    }

    public function removeAchat(Achats $achat): self
    {
        if ($this->achats->removeElement($achat)) {
            // set the owning side to null (unless already changed)
            if ($achat->getFournisseurs() === $this) {
                $achat->setFournisseurs(null);
            }
        }

        return $this;
    }
}
