<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{
    private UserPasswordEncoderInterface $passwordEncoder;
    private EntityManagerInterface $entityManager;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
    }

    public function create(User $user, string $plainPassword): void
    {
        $token = $this->createToken();
        $user->setConfirmationToken($token);

        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $plainPassword)
        );

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    private function createToken(): string
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
    }
}
