<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    #[Route('/user', name: 'user')]
    public function index(EntityManagerInterface $em): Response
    {
        $user = new User();
        $plainPassword = ('Admin72');
        $user->setUsername('Majestic')
        ->setPassword($this->passwordHasher->hashPassword(
            $user,
            $plainPassword
        ))
        ->setRoles(['ROLE_ADMIN']);
    

        $em->persist($user);
        $em->flush();

        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }
}
