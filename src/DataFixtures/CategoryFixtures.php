<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Commentary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        [
            'name' => 'Yônen/Enfant',
            'categoryImage' => 'http://2.bp.blogspot.com/-9ILd4Qtyo18/USCSi1WQVOI/AAAAAAAAF8g/Ke-JG4aSQg8/s320/cache_10405873.jpg',
        ],
        [
            'name' => 'Shônen/Adolescent',
            'categoryImage' => 'https://tse3.mm.bing.net/th?id=OIP.f_0MAZM0DPBDLEYY1EFnyAHaEK&pid=Api&P=0&w=278&h=157',
        ],
        [
            'name' => 'Shôjo/Adolescente',
            'categoryImage' => 'https://tse2.explicit.bing.net/th?id=OIP.RQ8Gd4oA3FWZ0gbbu0Zx4QHaEz&pid=Api&P=0&w=246&h=160',
        ],
        [
            'name' => 'Seinen/Jeune homme',
            'categoryImage' => 'https://tse1.mm.bing.net/th?id=OIP.pZozg38FHsXz4PBpxnpjhQHaFH&pid=Api&P=0&w=231&h=160',
        ],
        [
            'name' => 'Seijin/Adulte',
            'categoryImage' => 'https://tse1.mm.bing.net/th?id=OIP.Z-6BlDwmlG3u7cuahjwAtgHaEw&pid=Api&P=0&w=238&h=154',
        ],
        [
            'name' => 'Manhwa/BD en Corée',
            'categoryImage' => 'https://www.animeinferno.com.au/wp-content/uploads/2015/10/MANHWA-2.jpg',
        ],
        ];
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $val) {
            $category = new Category();
            $category->setName($val['name']);
            $category->setCategoryImage($val['categoryImage']);
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);
            $manager->flush();
        }
    }
}
