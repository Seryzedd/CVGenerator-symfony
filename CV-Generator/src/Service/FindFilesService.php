<?php

namespace App\Service;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class FindFilesService
{
    private Finder $finder;

    function __construct()
    {
        $this->finder = new Finder();
        $this->filesystem = $filesystem = new Filesystem();
    }

    function findInFolder(string $folder): array
    {
        $response = [];

        $this->finder->files()->in( "/var/www/html/src/" . $folder)->name('*.html.twig');

        if ($this->finder->hasResults()) {
            foreach ($this->finder as $file) {
                $response[str_replace('.html.twig', "", $file->getBasename())] = $file->getBasename();
            }
        }

        return $response;
    }
}