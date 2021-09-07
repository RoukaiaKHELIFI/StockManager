<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
 * @var \Date
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="date")
 */
public $createdAt;
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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
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
}
