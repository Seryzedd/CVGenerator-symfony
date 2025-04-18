<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Profiler\Profiler;

final class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(?Profiler $profiler): Response
    {
        if (null !== $profiler) {
            // if it exists, disable the profiler for this particular controller action
            $profiler->disable();
        }

        if($this->getUser()) {
            return $this->redirectToRoute('app_curriculum_vitae');
        }
        
        return $this->render('homepage/index.html.twig', []);
    }
}
