<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tricksArray = array(
            "1" => array(
                "name" => "Nose grab",
                "description" => "Saisie de la partie avant de la planche, avec la main avant",
                "imageUrl" => "https://ultimatesnowsports.com/wp-content/uploads/2015/08/Nose-grab.jpg",
                "slug" => "nose-grab"
            ),
            "2" => array(
                "name" => "Stalefish",
                "description" => " Saisie de la carre backside de la planche entre les deux pieds avec la main arrière",
                "imageUrl" => "https://i.ytimg.com/vi/f9FjhCt_w2U/sddefault.jpg",
                "slug" => "stalefish"
            ),
            "3" => array(
                "name" => "360",
                "description" => "Trois six pour un tour complet",
                "imageUrl" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2015/12/how-to-frontside-360-snowboard-800.jpg",
                "slug" => "360"
            ),
            "4" => array(
                "name" => "Back flip",
                "description" => "Un back flip est une rotation verticale vers l'arrière.",
                "imageUrl" => "https://i.pinimg.com/originals/54/98/79/5498793f4249140638cdfe97c66aa6dd.jpg",
                "slug" => "back-flip"
            ),
            "5" => array(
                "name" => "Front flip",
                "description" => "Un front flip est une rotation verticale vers l'avant.",
                "imageUrl" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2012/12/IMG_7636-620x413.jpg",
                "slug" => "front-flip"
            ),
            "6" => array(
                "name" => "truck driver",
                "description" => "Saisie du carre avant et carre arrière avec chaque main (comme tenir un volant de voiture)",
                "imageUrl" => "https://snowboard.frederic-malard.com/illustrations/truck-driver-1.jpg",
                "slug" => "truck-driver"
            ),
            "7" => array(
                "name" => "japan air",
                "description" => "Saisie de l'avant de la planche, avec la main avant, du côté de la carre frontside.",
                "imageUrl" => "https://www.alexandrecorroy.fr/snowtricks/uploads/pictures/front_japan_air.jpg",
                "slug" => "japan-air"
            ),
            "8" => array(
                "name" => "Tail grab",
                "description" => "Saisie de la partie arrière de la planche, avec la main arrière",
                "imageUrl" => "https://lh3.googleusercontent.com/proxy/lAdTNam3JINVSGA2VYZY0KKRBhR9ldnm43clLbdkVMEwO596H96a_nggpjpul8euXJkdN5BlXnfHfEnALfZxHy-FW5EAaw8Vb_muLAwdgT7c7dvyLVZCILoDVlhoikA6G4SkvKWkL-W-k-Ir1RpzZ9ahPw",
                "slug" => "tail-grab"
            ),
            "9" => array(
                "name" => "indy",
                "description" => "Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière",
                "imageUrl" => "https://arts-majeurs.com/uploads/images/tricks/16.jpg",
                "slug" => "indy"
            ),
            "10" => array(
                "name" => "Mute",
                "description" => "Saisie de la carre frontside de la planche entre les deux pieds avec la main avant",
                "imageUrl" => "https://www.risorseonline.com/tutorial/snowboard/mute.jpg",
                "slug" => "mute"
            ),
        );

        foreach ($tricksArray as $trickFromArray)
        {
            $trick = new Trick();
            $trick->setName($trickFromArray['name']);
            $trick->setDescription($trickFromArray['description']);
            $trick->setImageUrl($trickFromArray['imageUrl']);
            $trick->setSlug($trickFromArray['slug']);

            $manager->persist($trick);
        }

        $manager->flush();
    }
}
