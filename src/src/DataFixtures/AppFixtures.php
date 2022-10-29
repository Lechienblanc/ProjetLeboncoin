<?php

namespace App\DataFixtures;

use App\Factory\ArticleFactory;
use App\Factory\CategorieFactory;
use App\Factory\ImageFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        CategorieFactory::createMany(10);
        UserFactory::createMany(5);
        ArticleFactory::createMany(20);
        ImageFactory::createMany(30);

        $manager->flush();
    }
}
