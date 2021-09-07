<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DepenseRepository;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=DepenseRepository::class)
 */
class Depense
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $But;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

     /**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 */
private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBut(): ?string
    {
        return $this->But;
    }

    public function setBut(string $But): self
    {
        $this->But = $But;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
