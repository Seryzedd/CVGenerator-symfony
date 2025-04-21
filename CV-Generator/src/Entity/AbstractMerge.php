<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping as ORM;

#[MappedSuperclass]
abstract class AbstractMerge
{
    #[ORM\Column]
    protected int $number = 0;

    #[ORM\Column(length: 10, nullable: true)]
    protected ?string $type = null;

    public function getNumber(): ?int 
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->type = $number;

        return $this;
    }

    public function getType(): ?string 
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}