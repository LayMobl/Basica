<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
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
    private $titrefr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $titreen;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $slugfr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $slugen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrefr(): ?string
    {
        return $this->titrefr;
    }

    public function setTitrefr(string $titrefr): self
    {
        $this->titrefr = $titrefr;

        return $this;
    }

    public function getTitreen(): ?string
    {
        return $this->titreen;
    }

    public function setTitreen(string $titreen): self
    {
        $this->titreen = $titreen;

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

    public function __toString()
	{
		return $this->titrefr;
	}
}
