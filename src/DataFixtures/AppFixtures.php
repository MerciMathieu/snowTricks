<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Media;
use App\Entity\Trick;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $tricksArray = [
            "1" => [
                "title" => "Nose grab",
                "shortDescription" => "Saisie de la partie avant de la planche, avec la main avant",
                "description" => "Pas le plus facile des grab à effectuer, le nosegrab constitue à saisir l'avant du snowboard. À l'inverse, un grab sur l'arrière de la planche avec la main arrière s'appelle un tailgrab.",
                "medias" => [
                    "1" => [
                        "url" => "https://ultimatesnowsports.com/wp-content/uploads/2015/08/Nose-grab.jpg",
                        "type" => "image"
                    ],
                    "2" => [
                        "url" => "https://cdn.shopify.com/s/files/1/0230/2239/files/3_b5916b1c-dec5-4882-8e5d-abf311e254b3_large.jpg?v=1517870727",
                        "type" => "image"
                    ],
                    "3" => [
                        "url" => "https://www.youtube.com/embed/gZFWW4Vus-Q",
                        "type" => "video"
                    ],
                    "4" => [
                        "url" => "https://www.youtube.com/embed/y2MHu0mbzQw",
                        "type" => "video"
                    ],
                    "5" => [
                        "url" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Nose-Grab-620x440.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Grab",
                "comments" => [
                    "1" => [
                        "content" => "I can drive 10 miles, walk 50 feet. Turn around and before I know it, I'd be back home. Or would I? I'm not sure but that's just how it is."
                    ],
                    "2" => [
                        "content" => "If I could I would. Wether or not I should, I still would."
                    ],
                    "3" => [
                        "content" => "Look! In the sky. It's a bird, it's a plane. Or is it a hellicopter? No actually I think it is a bird. Or maybe I'm just seeing things. Who knows... After 10 shots of Whiskey things start to get a bit strange."
                    ],
                    "4" => [
                        "content" => "You can find me in the club, bottle full of bub Look mami I got the X if you into taking drugs I'm into having sex, I ain't into makin love So come give me a hug if you into getting rubbed."
                    ],
                    "5" => [
                        "content" => "I never meant to cause you any sorrow. I never meant to cause you any pain. I only wanted to one time see you laughing. I only wanted to see you laughing in the purple rain."
                    ],
                    "6" => [
                        "content" => "yes sure !"
                    ],
                ]
            ],
            "2" => [
                "title" => "Stalefish",
                "shortDescription" => "Saisie de la carre backside de la planche entre les deux pieds avec la main arrière",
                "description" => "Figure aérienne, main arrière sur la carre talons, entre les fixations, derrière la jambe arrière tendue. Dans un summer camp qu'il effectuait à Stockholm, Tony Hawk notait sur un carnet, sorte de journal intime, tout ce qu'il fesait, mangeait, ridait, ses nouveaux tricks...
                 Un mec est tombé dessus et lui a demandé si le stalefish était le nom du trick qu'il avait inventé cet après midi là. Tony a répondu oui alors que stalefish désignait simplement le poisson grillé qu'il avait mangé la veille.",
                "medias" => [
                    "1" => [
                        "url" => "https://i.ytimg.com/vi/f9FjhCt_w2U/sddefault.jpg",
                        "type" => "image",
                    ]
                ],
                "category" => "Grab",
                "comments" => [
                    "1" => [
                        "content" => "I can drive 10 miles, walk 50 feet. Turn around and before I know it, I'd be back home. Or would I? I'm not sure but that's just how it is."
                    ],
                    "2" => [
                        "content" => "If I could I would. Wether or not I should, I still would."
                    ],
                    "3" => [
                        "content" => "Look! In the sky. It's a bird, it's a plane. Or is it a hellicopter? No actually I think it is a bird. Or maybe I'm just seeing things. Who knows... After 10 shots of Whiskey things start to get a bit strange."
                    ],
                    "4" => [
                        "content" => "You can find me in the club, bottle full of bub Look mami I got the X if you into taking drugs I'm into having sex, I ain't into makin love So come give me a hug if you into getting rubbed."
                    ]
                ]
            ],
            "3" => [
                "title" => "360",
                "shortDescription" => "Trois six pour un tour complet",
                "description" => "Ce trick est en quelque sorte un hybride entre le kickflip et le 360 shove-it (double shove-it]. Le but de cette figure est de faire effectuer à la planche un tour complet de 360° autour d'un axe vertical, tout en la faisant vriller sur elle-même à la manière d'un kickflip.Pour effectuer ce trick, le skateur place ses pieds en position normale (comme pour un ollie], à ceci près qu'il prend soin de faire dépasser légèrement de la planche les orteils de son pied arrière. Il peut également s'avérer judicieux de tourner légèrement la pointe de l'autre pied vers l'avant. Lors de la figure, le skateur se sert de son pied arrière pour assurer la rotation de 360° horizontal, alors que son pied avant se charge du kickflip.",
                "medias" => [
                    "1" => [
                        "url" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2015/12/how-to-frontside-360-snowboard-800.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Rotation",
                "comments" => [
                    "1" => [
                        "content" => "I can drive 10 miles, walk 50 feet. Turn around and before I know it, I'd be back home. Or would I? I'm not sure but that's just how it is."
                    ],
                    "2" => [
                        "content" => "If I could I would. Wether or not I should, I still would."
                    ],
                    "3" => [
                        "content" => "Look! In the sky. It's a bird, it's a plane. Or is it a hellicopter? No actually I think it is a bird. Or maybe I'm just seeing things. Who knows... After 10 shots of Whiskey things start to get a bit strange."
                    ],
                    "4" => [
                        "content" => "You can find me in the club, bottle full of bub Look mami I got the X if you into taking drugs I'm into having sex, I ain't into makin love So come give me a hug if you into getting rubbed."
                    ],
                    "5" => [
                        "content" => "I never meant to cause you any sorrow. I never meant to cause you any pain. I only wanted to one time see you laughing. I only wanted to see you laughing in the purple rain."
                    ],
                    "6" => [
                        "content" => "yes sure !"
                    ],
                    "7" => [
                        "content" => "You can find me in the club, bottle full of bub Look mami I got the X if you into taking drugs I'm into having sex, I ain't into makin love So come give me a hug if you into getting rubbed."
                    ],
                    "8" => [
                        "content" => "I never meant to cause you any sorrow. I never meant to cause you any pain. I only wanted to one time see you laughing. I only wanted to see you laughing in the purple rain."
                    ],
                ]
            ],
            "4" => [
                "title" => "Back flip",
                "shortDescription" => "Un back flip est une rotation verticale vers l'arrière.",
                "description" => "Un flip acrobatique est une séquence de mouvements corporels dans laquelle une personne saute dans l'air, puis tourne une ou plusieurs fois pendant l'air. Les virages acrobatiques sont effectués en acro dance, en course libre, en gymnastique, en cheerleading et dans diverses autres activités. Cela contraste avec le Freestyle BMX, dans lequel une personne tourne autour de la bicyclette. Les virages acrobatiques peuvent être démarrés à partir d'une position stationnaire et debout et ils sont également exécutés communément immédiatement après un autre mouvement de rotation, tel qu'un renfoncement ou un ressort, afin de tirer parti du moment angulaire développé dans le mouvement précédent. En général, les mains ne touchent pas le sol pendant l'exécution d'un basculement et les artistes s'efforcent généralement d'atterrir sur les pieds en position verticale.",
                "medias" => [
                    "1" => [
                        "url" => "https://i.pinimg.com/originals/54/98/79/5498793f4249140638cdfe97c66aa6dd.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Rotation",
                "comments" => []
            ],
            "5" => [
                "title" => "Front flip",
                "shortDescription" => "Un front flip est une rotation verticale vers l'avant.",
                "description" => "Un flip acrobatique est une séquence de mouvements corporels dans laquelle une personne saute dans l'air, puis tourne une ou plusieurs fois pendant l'air. Les virages acrobatiques sont effectués en acro dance, en course libre, en gymnastique, en cheerleading et dans diverses autres activités. Cela contraste avec le Freestyle BMX, dans lequel une personne tourne autour de la bicyclette. Les virages acrobatiques peuvent être démarrés à partir d'une position stationnaire et debout et ils sont également exécutés communément immédiatement après un autre mouvement de rotation, tel qu'un renfoncement ou un ressort, afin de tirer parti du moment angulaire développé dans le mouvement précédent. En général, les mains ne touchent pas le sol pendant l'exécution d'un basculement et les artistes s'efforcent généralement d'atterrir sur les pieds en position verticale.",
                "medias" => [
                    "1" => [
                        "url" => "https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2012/12/IMG_7636-620x413.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Rotation",
                "comments" => []
            ],
            "6" => [
                "title" => "truck driver",
                "shortDescription" => "Saisie du carre avant et carre arrière avec chaque main (comme tenir un volant de voiture]",
                "description" => "Le Truckdriver : meme principe que le cannonball sauf qu'au lieu d'attraper ... je l'inclue dans les rotations car ce n'est pas vraiment un tricks. Consiste à attraper le ski au niveau de la fixation avec la main du coté de ce ski (genre attraper le ski droit avec la main droite]. Variante du Safety, le Lui Kang, meme chose sauf qu'en meme temps que le grab tu tend l'autre jambe.",
                "medias" => [
                    "1" => [
                        "url" => "https://snowboard.frederic-malard.com/illustrations/truck-driver-1.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Grab",
                "comments" => []
            ],
            "7" => [
                "title" => "japan air",
                "shortDescription" => "Saisie de l'avant de la planche, avec la main avant, du côté de la carre frontside.",
                "description" => "Pareil que le critical sauf que tu attrapes plus vers la spatule,voir sur la spatule ça ferait un true nose grab...on peut le faire en double nose grab,main droite attrape ski droite,main gauche attrape ski gauche. Consiste à attraper le ski dérriere la fixation généralement en croisant les skis, avec la main qui est du coté du ski grabé. Variante,le true tail-grab(ou blunt] ou tu attrapes à la spatule arriere(plus dur]",
                "medias" => [
                    "1" => [
                        "url" => "https://www.alexandrecorroy.fr/snowtricks/uploads/pictures/front_japan_air.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Grab",
                "comments" => []
            ],
            "8" => [
                "title" => "Tail grab",
                "shortDescription" => "Saisie de la partie arrière de la planche, avec la main arrière",
                "description" => " On attrape avec la main droite le ski droit et avec la main gauche le ski gauche.C'est un grab assez dur en rotation du fait qu'on eut pas s'aider des bras pour l'equilire qui sont deja pris pour le grab. meme principe que le cannonball sauf qu'au lieu d'attraper aux deux fixs avec ses deux mains ben on attrape plus devant,au milieu quoi,entre le nose et les fixs..  C'est faire son grab(normal]et accentuer ce grab(en mute par exemple tirer le ski pourq ue ce soit plus croisé]Tweaker n'est pas forcemment plus jolie.",
                "medias" => [
                    "1" => [
                        "url" => "https://cdn.shopify.com/s/files/1/0230/2239/articles/How-To-Nose-_-Tail-Grab_1024x1024.jpg?v=1517796651",
                        "type" => "image"
                    ]
                ],
                "category" => "Grab",
                "comments" => []
            ],
            "9" => [
                "title" => "indy",
                "shortDescription" => "Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière",
                "description" => "On en voit plus trop...c'est le fait d'attraper son ski gauche avec la main droite devant la fixation et de mettre son ski gauche au dessus de son genoux droit ;] Pour ce qui est du ski droit on le met derriere en gratte dos,c'est en quelques sorte un daffy mais avec le ski avant grabbé devant la fix. On peut l'inclure avec les autres mais bon,c'est pas trop repandu ou alors involontairement...C'est un tail grab mais sans les skis croisés,tu attrapes donc juste la spatule arriere. Mick deschenaux fait des tail defois qui rejoigent des tell grab(mais il y met du style donc c'est zoli...]",
                "medias" => [
                    "1" => [
                        "url" => "https://arts-majeurs.com/uploads/images/tricks/16.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Grab",
                "comments" => []
            ],
            "10" => [
                "title" => "Mute",
                "shortDescription" => "Saisie de la carre frontside de la planche entre les deux pieds avec la main avant",
                "description" => "Consiste à attraper le ski dérriere la fixation généralement en croisant les skis, avec la main qui est du coté du ski grabé. Variante,le true tail-grab(ou blunt] ou tu attrapes à la spatule arriere(plus dur] (photo 1] Autre variante le toxic tail grab ou au lieu d'attraper le skis sur la carre interieure(le plus simple]on ira attraper sur la carre exterieure(et souvent derriere la fixation]",
                "medias" => [
                    "1" => [
                        "url" => "https://www.risorseonline.com/tutorial/snowboard/mute.jpg",
                        "type" => "image"
                    ]
                ],
                "category" => "Grab",
                "comments" => []
            ]
        ];
        $usersArray = [
            "1" => [
                "userName" => "admin",
                "email" => "admin@snowtricks.fr",
                "password" => "admin"
            ]
        ];

        foreach ($usersArray as $userFromArray) {
            $user = new User();
            $user->setUserName($userFromArray['userName']);
            $user->setEmail($userFromArray['email']);
            $user->setPassword($this->encoder->encodePassword($user, $userFromArray['password']));
            $manager->persist($user);
        }

        foreach ($tricksArray as $trickFromArray) {
            $trick = new Trick();
            $trick->setTitle($trickFromArray['title']);
            $trick->setShortDescription($trickFromArray['shortDescription']);
            $trick->setDescription($trickFromArray['description']);
            $trick->setCategory($trickFromArray['category']);
            $trick->setAuthor($user);
            $manager->persist($trick);

            foreach ($trickFromArray['medias'] as $mediaFromArray) {
                $media = new Media();
                $media->setTrick($trick);
                $media->setUrl($mediaFromArray['url']);
                $media->setType($mediaFromArray['type']);
                $manager->persist($media);
            }

            foreach ($trickFromArray['comments'] as $commentFromArray) {
                $comment = new Comment();
                $comment->setTrick($trick);
                $comment->setAuthor($user);
                $comment->setContent($commentFromArray['content']);
                $manager->persist($comment);
            }
            $trick->addMedia($media);
            $trick->addComment($comment);
        }
        $manager->flush();
    }
}
