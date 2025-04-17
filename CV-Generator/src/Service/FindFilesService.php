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

    public function findInFolder(string $folder, string $base = "/var/www/html/src/"): array
    {
        $response = [];

        $this->finder->files()->in($base . $folder)->name('*.html.twig');

        if ($this->finder->hasResults()) {
            foreach ($this->finder as $file) {
                $response[str_replace('.html.twig', "", $file->getBasename())] = $file->getBasename();
            }
        }

        return $response;
    }

    public function findDirectory(string $dir, $base = "/var/www/html/")
    {
        try {
            return $this->findInFolder($dir, $base);
        } catch(\Exception $e) {
            return false;
        }
        
    }

    public function getBaseDirectory()
    {
        return "/var/www/html/";
    }
}