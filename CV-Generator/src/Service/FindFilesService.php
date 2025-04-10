<?php

namespace App\Service;

use Symfony\Component\Finder\Finder;

class FindFilesService
{
    private Finder $finder;

    function __construct()
    {
        $this->finder = new Finder();
    }

    function findInFolder(string $folder): array
    {
        $response = [];
        
        $this->finder->files()->in(__DIR__ . "\..\\" . $folder)->name('*.html.twig');

        if ($this->finder->hasResults()) {
            foreach ($this->finder as $file) {
                $response[str_replace('.html.twig', "", $file->getBasename())] = $file->getBasename();
            }
        }

        return $response;
    }
}