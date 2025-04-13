<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ChangePasswordFormType;
use App\Form\UserInformationType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/account')]
final class AccountController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    #[Route('', name: 'app_account')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/password/update', name: 'app_password_reset')]
    public function UpdatePassword(Request $request, UserPasswordHasherInterface $passwordHasher): Response 
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // Encode(hash) the plain password, and set it.
            $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
            $this->entityManager->flush();

            $this->addFlash(
               'success',
               'Password successfully updated !'
            );

            return $this->redirectToRoute('app_account');
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form,
        ]);
    }

    #[Route('/update', name: 'app_account_update')]
    public function updateUser(Request $request): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(UserInformationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->entityManager->flush();

            $this->addFlash(
               'success',
               'Account is updated !'
            );

            return $this->redirectToRoute('app_account');
        }

        return $this->render('account/update.html.twig', [
            'form' => $form
        ]);
    }
}
