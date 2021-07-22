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
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/one-piece.jpg',
            'synopsis' => 'Monkey D. Luffy est un garçon espiègle, rêve de devenir le roi des pirates en trouvant le «One Piece», un fabuleux et mystérieux trésor. Mais, par mégarde, Luffy a avalé un jour un «fruit magique du démon» qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager, le comble pour un pirate ! Au fil d\'aventures toujours plus rocambolesques et de rencontres fortuites, Luffy va progressivement composer son équipage et multiplier les amitiés avec les peuples qu\'il découvre, tout en affrontant de redoutables ennemis.',
            'status' => 'En cours',
            'gender' => 'Fantastique, Drame, Mystère, Surnaturel, Action, Comédie, Fruit, Magie, Pirates, Pouvoirs, Aventure, Roi, Amitié, Combats, Guerre',
            'author' => 'Eiichirō Oda',
            'artistes' => 'Eiichirō Oda',
            'isAnimated' => true,
            'firstPublishAt' => '1997',
            'category' => 1,
        ],
        [
            'title' => 'Berserk',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/berserk.jpg',
            'synopsis' => 'On suit les aventures de Guts, un mercenaire pour qui seuls les combats, la guerre, comptent. Jusqu\'au jour où il rencontre un mystérieux jeune homme au charisme surprenant, Griffith.',
            'status' => 'Inachevée',
            'gender' => 'Fantastique, Drame, Mature, Surnaturel, Démons, Action, Horreur, Gore, Militaire, Aventure, Combats, Guerre, Tragédie, Monstres, Moyen Âge, Psychologie',
            'author' => 'Kentaro Miura',
            'artistes' => 'Kentaro Miura',
            'isAnimated' => true,
            'firstPublishAt' => '1989',
            'category' => 3,
        ],
        [
            'title' => 'Sun Ken Rock',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/sun-ken-rock.jpg',
            'synopsis' => 'Kitano Ken, un jeune Japonais, débarque à Séoul avec un seul but : devenir agent de police comme Yumin, la fille qu’il aime. C’est le début pour lui d’une succession de galères... Alors qu’il pleure son désespoir au comptoir d’un resto ambulant, des mafieux viennent s’en prendre au patron. Le sang de Ken ne fait alors qu’un tour et les coups de poings volent ! Ce que Ken ignore, c’est que Tae-soo, le boss d’un gang de quartier, a apprécié sa réaction et ses qualités de combattant. Il compte bien l’enrôler dans sa bande. Bastons, jolies femmes et costards de marque : pour Ken, c’est le début d’une nouvelle vie mouvementée... et pleine d’humour !',
            'status' => 'Terminé',
            'gender' => 'Drame, Mature, Psychologique, Ecchi, Action, Horreur, Comédie, Aventure, Combats, Romance, Tragédie, Mafia, Arts Martiaux, Adulte, Smut, Humour',
            'author' => 'Boichi',
            'artistes' => 'Boichi',
            'isAnimated' => false,
            'firstPublishAt' => '2006',
            'category' => 3,
        ],
        [
            'title' => 'Doroehdoro',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/dorohedoro.jpg',
            'synopsis' => 'Caiman a été changé en lézard par un mage d\'une autre dimension, c\'est tout ce dont il se souvient. Décidé à retrouver sa trace il s\'engage avec son amie Nikaido dans une grande quête au milieu d\'un Japon dévasté post-apocalyptique...',
            'status' => 'Terminé',
            'gender' => 'Suspense, Fantastique, Drame, Mature, Mystère, Psychologique, Surnaturel, Action, Horreur, Comédie',
            'author' => 'Hayashida Q',
            'artistes' => 'Hayashida Q',
            'isAnimated' => true,
            'firstPublishAt' => '2001',
            'category' => 3,
        ],
        [
            'title' => 'Gantz',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/gantz.jpg',
            'synopsis' => 'Keï Kurono et Masaru Kato, deux lycéens comme les autres, se font écraser par une rame de métro alors qu’ils aidaient un sans-abri. Pourtant, à l’instant même où la vie les quitte, ils se retrouvent dans un étrange appartement en compagnie d\'autres personnes venant également de “mourir”. Tandis que tous tentent de comprendre comment ils sont arrivés là et comment en partir, une mystérieuse sphère noire apparaît et les somme d\'éliminer “l\'homme poireau”…',
            'status' => 'Terminé',
            'gender' => 'Fantastique, Mature, Psychologique, Surnaturel, Ecchi, Action, Horreur, Gore, Tournois, Compétition, Combats, Romance, Tragédie, Extra-terrestres, Science-fiction, Autre Monde, Isekai, Mort, Aliens, Vampires, Adulte, Sexuel Violence',
            'author' => 'Oku Hiroya',
            'artistes' => 'Oku Hiroya',
            'isAnimated' => true,
            'firstPublishAt' => '2000',
            'category' => 1,
        ],
        [
            'title' => 'One Punch Man',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/one-punch-man.jpg',
            'synopsis' => 'L\'histoire nous entraîne dans la vie de Saitama, un chômeur qui souhaite devenir un Super-Héros. Après 3 années d\'entrainement, il parvient enfin à développer un grand pouvoir, mais malheureusement pour lui, il réussit à détruire n\'importe quel ennemi, aussi puissant soit-il, en un seul coup de poing. Cela finit par être la cause de beaucoup de frustration car Saitama alias One Punch Man ne se sent plus l\'émotion et l\'adrénaline des combats. Néanmoins, un grand pouvoir implique de grandes responsabilités...',
            'status' => 'En cours',
            'gender' => 'Drame, Surnaturel, Action, Comédie, Pouvoirs, Combats, Super Pouvoirs, Monstres, Science-fiction, Super-vilains, Super-héros, Cyborgs, Aliens, Parodie, Arts Martiaux',
            'author' => 'One',
            'artistes' => 'Murata Yûsuke',
            'isAnimated' => true,
            'firstPublishAt' => '2012',
            'category' => 1,
        ],
        [
            'title' => 'Slam Dunk',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/slam-dunk.jpg',
            'synopsis' => 'D’un côté, Hanamichi Sakuragi, un grand rouquin, voyou, rebelle à ses heures et dont la principale caractéristique est d’être malheureux en amour. De l’autre, la jolie Haruko, très grande fan de basket... dont Hanamichi tombe éperdument amoureux! Il n’en faut pas plus à notre héros pour se jeter à corps perdu dans ce sport dont il ne connaît absolument rien. Mais un amour n’est pas forcément réciproque… C’est ce que Hanamichi va d’abord découvrir et c’est ce qui va ensuite le motiver à donner le meilleur de lui-même.',
            'status' => 'Terminé',
            'gender' => 'Drame, School Life, Sport, Comédie, Club, Ecole, Lycée, Humour, Collège, Basket, Basketball',
            'author' => 'Inoue Takehiko',
            'artistes' => 'Inoue Takehiko',
            'isAnimated' => true,
            'firstPublishAt' => '1990',
            'category' => 1,
        ],
        [
            'title' => 'Nana',
            'imageBook' => 'https://www.japscan.ws/imgs/mangas/nana.jpg',
            'synopsis' => 'La première est rêveuse, rigolote et sensible, mais « coeur d´artichaut », un brin capricieuse et loin d´être indépendante. La seconde est plus mature, déterminée, un peu mystérieuse mais peut être d´une froideur qui glace le dos. Toutes deux s´appellent « Nana », ont un attrait pour l´art et ont vécu en province. Toutes deux vont connaître l´Amour et décider de partir pour Tokyo.',
            'status' => 'En cours',
            'gender' => 'Drame, Mature, Tranche De Vie, Comédie, Romance, Tragédie, Musique',
            'author' => 'Yazawa Ai',
            'artistes' => 'Yazawa Ai',
            'isAnimated' => true,
            'firstPublishAt' => '2000',
            'category' => 2,
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
