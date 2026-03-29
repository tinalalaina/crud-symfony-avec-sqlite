<?php

namespace App\Entity;

use App\Repository\Produit2Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Produit2Repository::class)]
class Produit2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $produit = null;

    #[ORM\Column(length: 255)]
    private ?string $autre2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(?string $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getAutre2(): ?string
    {
        return $this->autre2;
    }

    public function setAutre2(string $autre2): static
    {
        $this->autre2 = $autre2;

        return $this;
    }
}
