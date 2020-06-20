<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Painting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i = 0; $i < 6; $i++){
            $category = new Category();
            $category->setName($faker->sentence())
                    ->setDescription($faker->text());

            $manager->persist($category);

            for($u = 0; $u < mt_rand(3, 9); $u++){
                $painting = new Painting();
                $painting->setPicture($faker->imageUrl())
                        ->setDescrition($faker->text())
                        ->setName($faker->sentence())
                        ->setCategory($category)
                        ->setOnline(true);

                $manager->persist($painting);
            }
        }

        $manager->flush();
    }
}
