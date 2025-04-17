<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\CurriculumVitae;
use App\Service\PDFGenerator;

#[Route('/file')]
final class FileController extends AbstractController
{

    #[Route('/pdf/{cv}', name: 'app_pdf')]
    public function index(CurriculumVitae $cv, PDFGenerator $generator): Response
    {

        return $generator->generatePdfFromHtml($cv->getTemplate(), ['cv' => $cv]);
    }
}
