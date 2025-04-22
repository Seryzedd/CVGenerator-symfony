<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(length: 100)]
    #[ORM\JoinColumn(nullable: false)]
    private ?string $prefixClass = "";

    #[ORM\ManyToOne(inversedBy: 'blocks', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CurriculumVitae $cv = null;

    const PLACEMENT_LIST = [
        'Side' => 'side',
        "Main" => "main"
    ];

    #[ORM\Column(length: 150)]
    private ?string $placement = "";

    #[ORM\Column(type: 'boolean')]
    private bool $withDates = false;

    /**
     * @var Collection<int, Line>
     */
    #[ORM\OneToMany(targetEntity: Line::class, mappedBy: 'block', orphanRemoval: true, cascade: ['persist', 'remove'])]
    #[OrderBy(["startAt" => "DESC"])]
    private Collection $blockLines;

    public function __construct()
    {
        $this->blockLines = new ArrayCollection();
    }

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

    public function getPrefixClass(): ?string
    {
        return $this->prefixClass;
    }

    public function setPrefixClass(?string $prefix): static
    {
        $this->prefixClass = $prefix;

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

    /**
     * @return Collection<int, Line>
     */
    public function getBlockLines(): Collection
    {
        return $this->blockLines;
    }

    public function addBlockLine(Line $blockLine): static
    {
        if (!$this->blockLines->contains($blockLine)) {
            $this->blockLines->add($blockLine);
            $blockLine->setBlock($this);
        }

        return $this;
    }

    public function removeBlockLine(Line $blockLine): static
    {
        if ($this->blockLines->removeElement($blockLine)) {
            // set the owning side to null (unless already changed)
            if ($blockLine->getBlock() === $this) {
                $blockLine->setBlock(null);
            }
        }

        return $this;
    }

    public function getWithDates(): bool
    {
        return $this->withDates;
    }

    public function setWithDates(bool $value): self
    {
        $this->withDates = $value;

        return $this;
    }
}
