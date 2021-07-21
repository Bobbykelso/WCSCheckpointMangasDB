<?php

namespace App\DataFixtures;

use App\Entity\Commentary;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentaryFixtures extends Fixture implements DependentFixtureInterface
{
    public const COMMENTARIES = [
        [
            'content' => 'commentaire de test numero 1 ',
            'date' => '2021-07-21',
            'commentIsActive' => true,
            'user' => 1,
            'book' => 0,
        ],
        [
            'content' => 'commentaire de test numero 2 ',
            'date' => '2021-07-22',
            'commentIsActive' => true,
            'user' => 0,
            'book' => 0,
        ],
        [
            'content' => 'commentaire de test numero 3 ',
            'date' => '2021-07-22',
            'commentIsActive' => true,
            'user' => 0,
            'book' => 0,
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::COMMENTARIES as $key => $val) {
            $commentary = new Commentary();
            $commentary->setContent($val['content']);
            $commentary->setDate(new DateTime('now'));
            $commentary->setCommentIsActive($val['commentIsActive']);
            $manager->persist($commentary);
//            $this->addReference('commentary_' . $key, $commentary);
            $commentary->setBook($this->getReference('book_' . $val['book']));
            $commentary->setUser($this->getReference('user_' . $val['user']));
            $manager->flush();
        }
    }
    public function getDependencies(): array
    {
        return [
            BookFixtures::class,
            UserFixtures::class
        ];
    }
}
