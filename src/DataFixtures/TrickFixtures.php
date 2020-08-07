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
                "shortDescription" => "Saisie de la partie avant de la planche, avec la main avant",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://ultimatesnowsports.com/wp-content/uploads/2015/08/Nose-grab.jpg",
                "slug" => "nose-grab",
                "category" => "Grab"
            ),
            "2" => array(
                "name" => "Stalefish",
                "shortDescription" => "Saisie de la carre backside de la planche entre les deux pieds avec la main arrière",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://i.ytimg.com/vi/f9FjhCt_w2U/sddefault.jpg",
                "slug" => "stalefish",
                "category" => "Grab"
            ),
            "3" => array(
                "name" => "360",
                "shortDescription" => "Trois six pour un tour complet",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2015/12/how-to-frontside-360-snowboard-800.jpg",
                "slug" => "360",
                "category" => "Rotation"
            ),
            "4" => array(
                "name" => "Back flip",
                "shortDescription" => "Un back flip est une rotation verticale vers l'arrière.",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://i.pinimg.com/originals/54/98/79/5498793f4249140638cdfe97c66aa6dd.jpg",
                "slug" => "back-flip",
                "category" => "Rotation"
            ),
            "5" => array(
                "name" => "Front flip",
                "shortDescription" => "Un front flip est une rotation verticale vers l'avant.",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2012/12/IMG_7636-620x413.jpg",
                "slug" => "front-flip",
                "category" => "Rotation"
            ),
            "6" => array(
                "name" => "truck driver",
                "shortDescription" => "Saisie du carre avant et carre arrière avec chaque main (comme tenir un volant de voiture)",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://snowboard.frederic-malard.com/illustrations/truck-driver-1.jpg",
                "slug" => "truck-driver",
                "category" => "Grab"
            ),
            "7" => array(
                "name" => "japan air",
                "shortDescription" => "Saisie de l'avant de la planche, avec la main avant, du côté de la carre frontside.",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://www.alexandrecorroy.fr/snowtricks/uploads/pictures/front_japan_air.jpg",
                "slug" => "japan-air",
                "category" => "Grab"
            ),
            "8" => array(
                "name" => "Tail grab",
                "shortDescription" => "Saisie de la partie arrière de la planche, avec la main arrière",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://lh3.googleusercontent.com/proxy/lAdTNam3JINVSGA2VYZY0KKRBhR9ldnm43clLbdkVMEwO596H96a_nggpjpul8euXJkdN5BlXnfHfEnALfZxHy-FW5EAaw8Vb_muLAwdgT7c7dvyLVZCILoDVlhoikA6G4SkvKWkL-W-k-Ir1RpzZ9ahPw",
                "slug" => "tail-grab",
                "category" => "Grab"
            ),
            "9" => array(
                "name" => "indy",
                "shortDescription" => "Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://arts-majeurs.com/uploads/images/tricks/16.jpg",
                "slug" => "indy",
                "category" => "Grab"
            ),
            "10" => array(
                "name" => "Mute",
                "shortDescription" => "Saisie de la carre frontside de la planche entre les deux pieds avec la main avant",
                "description" => "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.",
                "imageUrl" => "https://www.risorseonline.com/tutorial/snowboard/mute.jpg",
                "slug" => "mute",
                "category" => "Grab"
            )
        );

        foreach ($tricksArray as $trickFromArray)
        {
            $trick = new Trick();
            $trick->setName($trickFromArray['name']);
            $trick->setShortDescription($trickFromArray['shortDescription']);
            $trick->setDescription($trickFromArray['description']);
            $trick->setImageUrl($trickFromArray['imageUrl']);
            $trick->setSlug($trickFromArray['slug']);
            $trick->setCategory($trickFromArray['category']);

            $manager->persist($trick);
        }
        $manager->flush();
    }
}
