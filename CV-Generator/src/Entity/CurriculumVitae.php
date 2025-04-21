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

    #[ORM\OneToOne(inversedBy: 'curriculumVitae',targetEntity: Header::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private Header $header;

    #[ORM\OneToOne(inversedBy: 'curriculumVitae',targetEntity: AsideBlock::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?AsideBlock $asideBlock = null;

    #[ORM\OneToOne(inversedBy: 'curriculumVitae', targetEntity: MainBlock::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?MainBlock $mainBlock = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->blocks = new ArrayCollection();
        $this->asideBlock = new AsideBlock();
        $this->mainBlock = new MainBlock();
        $this->header = new Header();
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

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(Header $header): static
    {
        $header->setCurriculumVitae($this);

        $this->header = $header;

        return $this;
    }

    public function getAsideBlock(): ?AsideBlock
    {
        return $this->asideBlock;
    }

    public function setAsideBlock(AsideBlock $asideBlock): static
    {
        $asideBlock->setCurriculumVitae($this);

        $this->asideBlock = $asideBlock;

        return $this;
    }

    public function getMainBlock(): ?MainBlock
    {
        return $this->mainBlock;
    }

    public function setMainBlock(MainBlock $mainBlock): static
    {
        $mainBlock->setCurriculumVitae($this);

        $this->mainBlock = $mainBlock;

        return $this;
    }
}
