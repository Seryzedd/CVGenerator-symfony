<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlockRepository::class)]
class Block
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = "";

    #[ORM\ManyToOne(inversedBy: 'blocks', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CurriculumVitae $cv = null;

    const PLACEMENT_LIST = [
        'Side' => 'side',
        "Main" => "main"
    ];

    #[ORM\Column(length: 150)]
    private ?string $placement = "";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCv(): ?CurriculumVitae
    {
        return $this->cv;
    }

    public function setCv(?CurriculumVitae $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getPlacement(): string 
    {
        return $this->placement;
    }

    public function setPlacement(string $place): self 
    {
        $this->placement = $place;

        return $this;
    }
}
