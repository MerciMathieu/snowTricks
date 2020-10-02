<?php

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TrickRepository::class)
 * @ORM\Table(name="trick")
 * @UniqueEntity("title", message="Ce nom de figure existe déjà. ")
 */
class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Media::class, mappedBy="trick", orphanRemoval=true, cascade={"persist"})
     * @Assert\Valid
     * @var Media[]
     */
    private $medias;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tricks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="trick", orphanRemoval=true, cascade={"persist"})
     */
    private $comments;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getFirstImageUrl(): ?string
    {
        $images = $this->getTypedMediasUrl(Media::TYPE_IMAGE);
        return reset($images);
    }

    public function getTypedMediasUrl(string $type): array
    {
        $mediasUrl = [];
        foreach ($this->getMedias() as $media) {
            if ($media->getType() === $type) {
                $mediasUrl[] = $media->getUrl();
            }
        }

        return $mediasUrl;
    }

    public function computeSlug(SluggerInterface $slugger): void
    {
        $this->slug = (string) $slugger->slug((string) $this->title)->lower();
    }

    public function checkMedias(Trick $trick): ?Media
    {
        $media = null;

        foreach ($trick->getMedias() as $media) {
            if (stristr($media->getUrl(), '.jpg') || stristr($media->getUrl(), '.png')) {
                $media->setType(Media::TYPE_IMAGE);
            } else {
                $videoUrl = $media->getUrl();
                if (stripos($videoUrl, 'watch?v=')) {
                    $videoUrl = str_replace('watch?v=', 'embed/', $videoUrl);
                }
                if (stripos($videoUrl, '&')) {
                    $videoUrl = strstr($videoUrl, '&', true);
                }
                $media->setUrl($videoUrl);
                $media->setType(Media::TYPE_VIDEO);
            }
        }

        return $media;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function getVideos(): Collection
    {
        $videos = new ArrayCollection();

        foreach ($this->medias as $media) {
            if ($media->getType() === Media::TYPE_VIDEO) {
                $videos->add($media);
            }
        }

        return $videos;
    }

    public function getImages(): Collection
    {
        $images = new ArrayCollection();

        foreach ($this->medias as $media) {
            if ($media->getType() === Media::TYPE_IMAGE) {
                $images->add($media);
            }
        }

        return $images;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias[] = $media;
            $media->setTrick($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        if ($this->medias->contains($media)) {
            $this->medias->removeElement($media);
        }

        return $this;
    }

    public function addImage(Media $image): self
    {
        return $this->addMedia($image);
    }

    public function removeImage(Media $image): self
    {
        return $this->removeMedia($image);
    }

    public function addVideo(Media $video): self
    {
        return $this->addMedia($video);
    }

    public function removeVideo(Media $video): self
    {
        return $this->removeMedia($video);
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setTrick($this);
        }

        return $this;
    }
}
