<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
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
    private $titre_onefr;

    /**
     * @ORM\Column(type="text")
     */
    private $texte_onefr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $titre_twofr;

    /**
     * @ORM\Column(type="text")
     */
    private $texte_twofr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $titre_oneen;

    /**
     * @ORM\Column(type="text")
     */
    private $texte_oneen;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $titre_twoen;

    /**
     * @ORM\Column(type="text")
     */
    private $texte_twoen;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="posts")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function getTitreOnefr(): ?string
    {
        return $this->titre_onefr;
    }

    public function setTitreOnefr(string $titre_onefr): self
    {
        $this->titre_onefr = $titre_onefr;

        return $this;
    }

    public function getTitreOneen(): ?string
    {
        return $this->titre_oneen;
    }

    public function setTitreOneen(string $titre_oneen): self
    {
        $this->titre_oneen = $titre_oneen;

        return $this;
    }

    public function getTitreTwofr(): ?string
    {
        return $this->titre_twofr;
    }

    public function setTitreTwofr(string $titre_twofr): self
    {
        $this->titre_twofr = $titre_twofr;

        return $this;
    }

    public function getTitreTwoen(): ?string
    {
        return $this->titre_twoen;
    }

    public function setTitreTwoen(string $titre_twoen): self
    {
        $this->titre_twoen = $titre_twoen;

        return $this;
    }

    public function getTexteOnefr(): ?string
    {
        return $this->texte_onefr;
    }

    public function setTexteOnefr(string $texte_onefr): self
    {
        $this->texte_onefr = $texte_onefr;

        return $this;
    }

    public function getTexteTwoen(): ?string
    {
        return $this->texte_twoen;
    }

    public function setTexteTwoen(string $texte_twoen): self
    {
        $this->texte_twoen = $texte_twoen;

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

    public function getTexteOneen(): ?string
    {
        return $this->texte_oneen;
    }

    public function setTexteOneen(string $texte_oneen): self
    {
        $this->texte_oneen = $texte_oneen;

        return $this;
    }

    public function getTexteTwofr(): ?string
    {
        return $this->texte_twofr;
    }

    public function setTexteTwofr(string $texte_twofr): self
    {
        $this->texte_twofr = $texte_twofr;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    public function __toString()
	{
		return $this->nomfr;
	}
}
