<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const USERS = [
        [
            'firstname' => 'Jean',
            'lastname' => 'testing',
            'username' => 'testeur',
            'email' => 'testeur@test.com',
            'role' => ['ROLE_USER'],
            'avatar' => 'https://avatarfiles.alphacoders.com/852/85202.jpg',
            'isActive' => true,
            'isVerified' => false,
            'password' => 'testeurpassword',
        ],
        [
            'firstname' => 'Aurél',
            'lastname' => 'Admin',
            'username' => 'admin',
            'email' => 'aurel@admin.com',
            'role' => ['ROLE_ADMIN'],
            'avatar' => 'https://avatarfiles.alphacoders.com/181/181974.png',
            'isActive' => true,
            'isVerified' => false,
            'password' => 'adminpassword',

        ],
    ];

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::USERS as $key => $val) {
            $user = new User();
            $user->setFirstname($val['firstname']);
            $user->setLastname($val['lastname']);
            $user->setUsername($val['username']);
            $user->setEmail($val['email']);
            $user->setRoles($val['role']);
            $user->setIsActive($val['isActive']);
            $user->setIsVerified($val['isVerified']);
            $user->setAvatar($val['avatar']);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $val['password']));
            $manager->persist($user);
            $this->addReference('user_' . $key, $user);
            $manager->flush();
        }
    }
}
