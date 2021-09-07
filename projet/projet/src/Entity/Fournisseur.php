<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\FournisseurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

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
     * @ORM\Column(type="string", length=255)
     */
    private $nomE;

    /**
     * @ORM\Column(type="integer")
     */
    private $numC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precedent;
  /**
     * @ORM\OneToMany(targetEntity=Achats::class, mappedBy="fournisseur")
     */
    private $achats;

  
    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getNomE(): ?string
    {
        return $this->nomE;
    }

    public function setNomE(string $nomE): self
    {
        $this->nomE = $nomE;

        return $this;
    }

    public function getNumC(): ?int
    {
        return $this->numC;
    }

    public function setNumC(int $numC): self
    {
        $this->numC = $numC;

        return $this;
    }

    public function getPrecedent(): ?string
    {
        return $this->precedent;
    }

    public function setPrecedent(string $precedent): self
    {
        $this->precedent = $precedent;

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
