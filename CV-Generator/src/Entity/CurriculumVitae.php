<?php

namespace App\Entity;

use App\Repository\CurriculumVitaeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: CurriculumVitaeRepository::class)]
class CurriculumVitae
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'curriculumVitaes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $template = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $profileImg = null;

    #[ORM\Column(length: 10, nullable: true)]
    private string $sideColor = "";

    #[ORM\Column(length: 10, nullable: true)]
    private string $mainColor = "";

    #[ORM\Column(length: 10, nullable: true)]
    private string $textSideColor = "";

    #[ORM\Column(length: 10, nullable: true)]
    private string $textMainColor = "";

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $headBGColor;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $headTextColor ;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $titleSideColor ;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $titleMainColor ;

    #[ORM\Column(type: "datetime", nullable: true)]
    private \Datetime $createdAt;

    #[ORM\Column(type: "datetime", nullable: true)]
    private \Datetime $updatedAt;

    /**
     * @var Collection<int, Block>
     */
    #[ORM\OneToMany(targetEntity: Block::class, mappedBy: 'cv', fetch:"EXTRA_LAZY", cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $blocks;

    #[ORM\Column(type: "text", length:1000)]
    private string $description = "";

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->blocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(string $template): static
    {
        $this->template = $template;

        return $this;
    }

    public function getProfileImg(): ?string
    {
        return $this->profileImg;
    }

    public function setProfileImg(?string $profileImg): static
    {
        $this->profileImg = $profileImg;

        return $this;
    }

    public function getSideColor(): string 
    {
        return $this->sideColor;
    }

    public function setSideColor(string $color): self
    {
        $this->sideColor = $color;

        return $this;
    }

    public function getMainColor(): string 
    {
        return $this->mainColor;
    }

    public function setMainColor(string $color): self
    {
        $this->mainColor = $color;
        
        return $this;
    }

    public function getTextSideColor(): string 
    {
        return $this->textSideColor;
    }

    public function setTextSideColor(string $color): self
    {
        $this->textSideColor = $color;
        
        return $this;
    }

    public function getTextMainColor(): string 
    {
        return $this->textMainColor;
    }

    public function setTextMainColor(string $color): self
    {
        $this->textMainColor = $color;
        
        return $this;
    }

    #[ORM\PreUpdate]
    public function setCreatedAtValue(): self
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return Collection<int, Block>
     */
    public function getBlocks(): Collection
    {
        return $this->blocks;
    }

    public function addBlock(Block $block): static
    {
        if (!$this->blocks->contains($block)) {
            $this->blocks->add($block);
            $block->setCv($this);
        }

        return $this;
    }

    public function removeBlock(Block $block): static
    {
        if ($this->blocks->removeElement($block)) {
            // set the owning side to null (unless already changed)
            if ($block->getCv() === $this) {
                $block->setCv(null);
            }
        }

        return $this;
    }

    public function getDescription(): string 
    {
        return $this->description;
    }

    public function setDescription(string $description): self 
    {
        $this->description = $description;

        return $this;
    }

    public function setHeadBGColor(string $color): self
    {
        $this->headBGColor = $color;

        return $this;
    }

    public function getHeadBGColor(): string 
    {
        return $this->headBGColor;
    }

    public function setHeadTextColor(string $color): self
    {
        $this->headTextColor = $color;

        return $this;
    }

    public function getHeadTextColor(): string 
    {
        return $this->headTextColor;
    }

    public function setTitleSideColor(string $color): self 
    {
        $this->titleSideColor = $color;

        return $this;
    }

    public function getTitleSideColor(): string 
    {
        return $this->titleSideColor;
    }

    public function getTitleMainColor(): string 
    {
        return $this->titleMainColor;
    }

    public function setTitleMainColor(string $color): self 
    {
        $this->titleMainColor = $color;

        return $this;
    }
}
