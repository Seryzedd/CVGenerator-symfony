<?php

namespace App\Entity;

use App\Repository\LineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LineRepository::class)]
class Line
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endAt = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyName = null;

    #[ORM\ManyToOne(inversedBy: 'blockLines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Block $block = null;

    /**
     * @var Collection<int, LineDetail>
     */
    #[ORM\OneToMany(targetEntity: LineDetail::class, mappedBy: 'line', cascade: ['persist', 'remove'])]
    private Collection $lineDetails;

    public function __construct()
    {
        $this->lineDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(?\DateTimeInterface $startAt): static
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): static
    {
        $this->endAt = $endAt;

        return $this;
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

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getBlock(): ?Block
    {
        return $this->block;
    }

    public function setBlock(?Block $block): static
    {
        $this->block = $block;

        return $this;
    }

    /**
     * @return Collection<int, LineDetail>
     */
    public function getLineDetails(): Collection
    {
        return $this->lineDetails;
    }

    public function addLineDetail(LineDetail $lineDetail): static
    {
        if (!$this->lineDetails->contains($lineDetail)) {
            $this->lineDetails->add($lineDetail);
            $lineDetail->setLine($this);
        }

        return $this;
    }

    public function removeLineDetail(LineDetail $lineDetail): static
    {
        if ($this->lineDetails->removeElement($lineDetail)) {
            // set the owning side to null (unless already changed)
            if ($lineDetail->getLine() === $this) {
                $lineDetail->setLine(null);
            }
        }

        return $this;
    }
}
