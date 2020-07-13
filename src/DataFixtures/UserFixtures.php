<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setEmail('admin@example.com');
        $adminUser->setName('Admin User');
        $adminUser->setPassword($this->passwordEncoder->encodePassword($adminUser, '123456'));
        $adminUser->setRoles(['ROLE_ADMIN']);

        $manager->persist($adminUser);

        $user = new User();
        $user->setEmail('user@example.com');
        $user->setName('User');
        $user->setPassword($this->passwordEncoder->encodePassword($user, '123456'));

        $manager->persist($user);

        $manager->flush();
    }
}
