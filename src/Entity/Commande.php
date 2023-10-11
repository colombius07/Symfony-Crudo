<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 12)]
    private ?string $ncom = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATEcom = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNcom(): ?string
    {
        return $this->ncom;
    }

    public function setNcom(string $ncom): static
    {
        $this->ncom = $ncom;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getDATEcom(): ?\DateTimeInterface
    {
        return $this->DATEcom;
    }

    public function setDATEcom(\DateTimeInterface $DATEcom): static
    {
        $this->DATEcom = $DATEcom;

        return $this;
    }


}
