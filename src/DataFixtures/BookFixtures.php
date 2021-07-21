<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{

    public const BOOKS = [
        [
            'title' => 'One Piece',
            'imageBook' => 'https://static1.cbrimages.com/wordpress/wp-content/uploads/2020/11/One-Piece-Colorspread-header.jpg?q=50&fit=crop&w=960&h=500&dpr=1.5',
            'synopsis' => 'Monkey D. Luffy est un garçon espiègle, rêve de devenir le roi des pirates en trouvant le «One Piece», un fabuleux et mystérieux trésor. Mais, par mégarde, Luffy a avalé un jour un «fruit magique du démon» qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager, le comble pour un pirate ! Au fil d\'aventures toujours plus rocambolesques et de rencontres fortuites, Luffy va progressivement composer son équipage et multiplier les amitiés avec les peuples qu\'il découvre, tout en affrontant de redoutables ennemis.',
            'status' => 'En cours',
            'gender' => 'Fantastique, Drame, Mystère, Surnaturel, Action, Comédie, Fruit, Magie, Pirates, Pouvoirs, Aventure, Roi, Amitié, Combats, Guerre',
            'author' => 'Eiichirō Oda',
            'artistes' => 'Eiichirō Oda',
            'isAnimated' => true,
            'firstPublishAt' => '1997',
            'category' => 1,
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::BOOKS as $key => $val) {
            $book = new Book();
            $book->setTitle($val['title']);
            $book->setImageBook($val['imageBook']);
            $book->setSynopsis($val['synopsis']);
            $book->setStatus($val['status']);
            $book->setGender($val['gender']);
            $book->setAuthor($val['author']);
            $book->setArtistes($val['artistes']);
            $book->setIsAnimated($val['isAnimated']);
            $book->setFirstPublishAt(new DateTime($val['firstPublishAt']));
            $manager->persist($book);
            $this->addReference('book_' . $key, $book);
            $book->setCategory($this->getReference('category_' . $val['category']));
            $manager->flush();
        }
    }
    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class
        ];
    }
}
