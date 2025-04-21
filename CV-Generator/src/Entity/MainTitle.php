<?php

namespace App\Entity;

use App\Repository\MainTitleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MainTitleRepository::class)]
class MainTitle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Merge $merge = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMerge(): ?Merge
    {
        return $this->merge;
    }

    public function setMerge(?Merge $merge): static
    {

        $this->merge = $merge;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }
}
