<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'numProduit')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $numcom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $numProduit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: '0')]
    private ?string $qcom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumcom(): ?Commande
    {
        return $this->numcom;
    }

    public function setNumcom(?Commande $numcom): static
    {
        $this->numcom = $numcom;

        return $this;
    }

    public function getNumProduit(): ?Produit
    {
        return $this->numProduit;
    }

    public function setNumProduit(Produit $numProduit): static
    {
        $this->numProduit = $numProduit;

        return $this;
    }

    public function getQcom(): ?string
    {
        return $this->qcom;
    }

    public function setQcom(string $qcom): static
    {
        $this->qcom = $qcom;

        return $this;
    }
}
