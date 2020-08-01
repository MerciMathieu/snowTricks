<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         for ($i = 0; $i < 15; $i++)
         {
             $trick = new Trick();
             $trick->setName('name');
             $trick->setDescription('description');
             $trick->setSlug('slug');

             $manager->persist($trick);
         }
         $manager->flush();
    }
}
