<?php

namespace App\Entity;

use App\Repository\LineDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LineDetailRepository::class)]
class LineDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $beforeCharacter = null;

    #[ORM\ManyToOne(inversedBy: 'lineDetails')]
    private ?Line $line = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getBeforeCharacter(): ?string
    {
        return $this->beforeCharacter;
    }

    public function setBeforeCharacter(?string $beforeCharacter): static
    {
        $this->beforeCharacter = $beforeCharacter;

        return $this;
    }

    public function getLine(): ?Line
    {
        return $this->line;
    }

    public function setLine(?Line $line): static
    {
        $this->line = $line;

        return $this;
    }
}
