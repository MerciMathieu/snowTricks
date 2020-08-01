<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         for ($i = 0; $i < 15; $i++)
         {
             $trick = new Trick();
             $trick->setName("trick $i");
             $trick->setDescription("description trick $i");
             $trick->setImageUrl("https://picsum.photos/400/300");
             $trick->setSlug("trick-$i");

             $manager->persist($trick);
         }
         $manager->flush();
    }
}
