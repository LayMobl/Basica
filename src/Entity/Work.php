<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkRepository")
 */
class Work
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nomfr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nomen;

    /**
     * @ORM\Column(type="text")
     */
    private $textefr;

    /**
     * @ORM\Column(type="text")
     */
    private $texteen;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="works")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="works")
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomfr(): ?string
    {
        return $this->nomfr;
    }

    public function setNomfr(string $nomfr): self
    {
        $this->nomfr = $nomfr;

        return $this;
    }

    public function getNomen(): ?string
    {
        return $this->nomen;
    }

    public function setNomen(string $nomen): self
    {
        $this->nomen = $nomen;

        return $this;
    }

    public function getTextefr(): ?string
    {
        return $this->textefr;
    }

    public function setTextefr(string $textefr): self
    {
        $this->textefr = $textefr;

        return $this;
    }

    public function getTexteen(): ?string
    {
        return $this->texteen;
    }

    public function setTexteen(string $texteen): self
    {
        $this->texteen = $texteen;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

        return $this;
    }
}
