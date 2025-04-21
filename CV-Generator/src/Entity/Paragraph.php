<?php

namespace App\Entity;

use App\Repository\ParagraphRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParagraphRepository::class)]
class Paragraph extends TextConfiguration
{

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Merge $merge = null;

    public function getMerge(): ?Merge
    {
        return $this->merge;
    }

    public function setMerge(?Merge $merge): static
    {

        $this->merge = $merge;

        return $this;
    }
}
