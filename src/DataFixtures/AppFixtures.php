<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($p = 0; $p < mt_rand(10, 20); $p++) {
            $post = new Post();
            $words = $faker->words;
            $post->setTitle(implode(' ', $words))
                 ->setContent($faker->realText())
                 ->setCreatedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($post);
        }
        // $post1 = new Post();
        // $post1->setTitle('My title 1');
        // $post1->setContent('This is my first title');
        // $post1->setCreatedAt(new DateTime());
        // $manager->persist($post1);

        // $post2 = new Post();
        // $post2->setTitle('My title 2');
        // $post2->setContent('This is my first title');
        // $post2->setCreatedAt(new DateTime());
        // $manager->persist($post2);

        // $post3 = new Post();
        // $post3->setTitle('My title 3');
        // $post3->setContent('This is my first title');
        // $post3->setCreatedAt(new DateTime());
        // $manager->persist($post3);

        $manager->flush();
    }
}
