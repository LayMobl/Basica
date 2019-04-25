<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
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
     * @ORM\Column(type="string", length=45)
     */
    private $slugfr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $slugen;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Work", mappedBy="tags")
     */
    private $works;

    public function __construct()
    {
        $this->works = new ArrayCollection();
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

    public function getSlugfr(): ?string
    {
        return $this->slugfr;
    }

    public function setSlugfr(string $slugfr): self
    {
        $this->slugfr = $slugfr;

        return $this;
    }

    public function getSlugen(): ?string
    {
        return $this->slugen;
    }

    public function setSlugen(string $slugen): self
    {
        $this->slugen = $slugen;

        return $this;
    }

    /**
     * @return Collection|Work[]
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    public function addWork(Work $work): self
    {
        if (!$this->works->contains($work)) {
            $this->works[] = $work;
            $work->addTag($this);
        }

        return $this;
    }

    public function removeWork(Work $work): self
    {
        if ($this->works->contains($work)) {
            $this->works->removeElement($work);
            $work->removeTag($this);
        }

        return $this;
    }
}
