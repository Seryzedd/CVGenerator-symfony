<?php

namespace App\Service;

use Pontedilana\PhpWeasyPrint\Pdf;
use Twig\Environment;
use Pontedilana\WeasyprintBundle\WeasyPrint\Response\PdfResponse;
use App\Service\FindFilesService;

class PDFGenerator
{
    public function __construct(private Environment $twig, private Pdf $weasyprint) {}

    public function generatePdfFromHtml(string $template, array $param = [])
    {
        $html = $this->twig->render('curriculum_vitae/templates/' . $template, $param);

        $dir = $this->generateTempDir(new FindFilesService());

        $weasyprint = new Pdf();
        $weasyprint->setBinary("/usr/bin/weasyprint-wrapper");
        $weasyprint->setOption('timeout', 10);
        $weasyprint->setOption('encoding', 'utf8');

        $tempFile = $dir . '/cv-temp.pdf';

        return new PdfResponse(
            $weasyprint->getOutputFromHtml($html),
            'CV.pdf'
        );
    }

    private function generateTempDir(FindFilesService $fileFinder)
    {
        
        $directory = $fileFinder->getBaseDirectory() . "bin";

        return $directory;
    }
}