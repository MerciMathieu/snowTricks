<?php

namespace App\EntityListener;

use App\Entity\Trick;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Trick $trick)
    {
        $trick->computeSlug($this->slugger);
    }

    public function preUpdate(Trick $trick)
    {
        $trick->setUpdatedAt((new \DateTime("now")));
        $trick->computeSlug($this->slugger);
    }
}
