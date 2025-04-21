<?php

namespace App\Entity;

use App\Repository\HeaderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeaderRepository::class)]
class Header
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $backgroundColor = '';

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Merge::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Merge $merge = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Paragraph::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Paragraph $paragraph = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: MainTitle::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?MainTitle $mainTitle = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: SubTitle::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?SubTitle $subTitle = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Padding::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Padding $padding = null;

    #[ORM\OneToOne(mappedBy: 'header', cascade: ['persist', 'remove'])]
    private ?CurriculumVitae $curriculumVitae = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor): static
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getParagraph(): ?Paragraph
    {
        return $this->paragraph;
    }

    public function setParagraph(?Paragraph $paragraph): static
    {

        $this->paragraph = $paragraph;

        return $this;
    }

    public function getMainTitle(): ?MainTitle
    {
        return $this->mainTitle;
    }

    public function setMainTitle(MainTitle $mainTitle): static
    {

        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getSubTitle(): ?SubTitle
    {
        return $this->subTitle;
    }

    public function setSubTitle(SubTitle $subTitle): static
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    public function getPadding(): ?padding
    {
        return $this->padding;
    }

    public function setPadding(?padding $padding): static
    {
        $this->padding = $padding;

        return $this;
    }

    public function getMerge(): ?Merge 
    {
        return $this->merge;
    }

    public function setMerge(?Merge $merge): self 
    {
        $this->merge = $merge;

        return $this;
    }

    public function getCurriculumVitae(): ?CurriculumVitae
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(CurriculumVitae $curriculumVitae): static
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }
}
