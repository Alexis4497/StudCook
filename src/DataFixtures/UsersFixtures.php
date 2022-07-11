<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture

{
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Users();
        $user->setGrade(1);
        $user->setLogin('demo');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'demo'));
        $manager->persist($user);
        $manager->flush();
    }
}
