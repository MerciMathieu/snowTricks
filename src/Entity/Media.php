<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
{
    const TYPE_IMAGE = 'image';
    const TYPE_VIDEO = 'video';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url(
     *     protocols = {"http", "https"}
     * )
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Trick::class, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTrick(): Trick
    {
        return $this->trick;
    }

    public function setTrick(Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }
}
