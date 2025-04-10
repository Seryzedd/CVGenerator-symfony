<?php

namespace App\Entity;

use App\Repository\CurriculumVitaeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

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
        return $this->sideColor;
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
}
