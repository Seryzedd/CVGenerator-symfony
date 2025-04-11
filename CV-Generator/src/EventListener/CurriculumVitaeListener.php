<?php

namespace App\EventListener;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use App\Entity\CurriculumVitae;

#[AsEntityListener(event: Events::postUpdate, method: 'preUpdate', entity: User::class)]
final class CurriculumVitaeListener
{
    public function preUpdate($event): void
    {
        dump($event); die ;
    }
}
