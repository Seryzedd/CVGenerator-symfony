<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CurriculumVitaeRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CurriculumVitaeType;
use App\Entity\CurriculumVitae;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/curriculum-vitae')]
final class CurriculumVitaeController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    #[Route('', name: 'app_curriculum_vitae')]
    public function index(CurriculumVitaeRepository $CVRepository): Response
    {
        $myCVs = $CVRepository->findByUser($this->getUser());

        return $this->render('curriculum_vitae/index.html.twig', [
            'CVs' => $myCVs
        ]);
    }

    #[Route('/create', name: 'app_curriculum_vitae_new')]
    public function create(Request $request): Response 
    {
        
        $newCV = new CurriculumVitae();

        $this->getUser()->addCurriculumVitaes($newCV);

        $form = $this->createForm(CurriculumVitaeType::class, $newCV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form['profileImg']->getData();

            if ($file) {
                $this->updateCVProfileImg($file, $newCV);
            }

            $this->entityManager->persist($data);
            $this->entityManager->flush();

            $this->addFlash(
               'success',
               'Password successfully updated !'
            );

            return $this->redirectToRoute('app_curriculum_vitae_update', ['id' => $newCV->getId()]);
        }

        return $this->render('curriculum_vitae/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/update/{id}', name: 'app_curriculum_vitae_update')]
    public function update(Request $request, CurriculumVitae $id): Response 
    {
        
        $form = $this->createForm(CurriculumVitaeType::class, $id);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $file = $form['profileImg']->getData();
            
            if ($file) {
                $this->updateCVProfileImg($file, $id);
            }

            $this->entityManager->persist($data);
            $this->entityManager->flush();

            $this->addFlash(
               'success',
               'Password successfully updated !'
            );
        }

        return $this->render('curriculum_vitae/new.html.twig', [
            'form' => $form
        ]);
    }

    private function updateCVProfileImg(UploadedFile $file, CurriculumVitae $cv): void 
    {
        $imgContent = file_get_contents($file->getPathname());

        $b64img = 'data:image/' . $file->guessExtension() . ';base64,' . base64_encode($imgContent);

        $cv->setProfileImg($b64img);
    }
}
