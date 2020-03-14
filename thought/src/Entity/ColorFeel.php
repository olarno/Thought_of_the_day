<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ColorFeelRepository")
 */
class ColorFeel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $feel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Thought", mappedBy="colors")
     */
    private $thoughts;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function __construct()
    {
        $this->thoughts = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->feel;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getFeel(): ?string
    {
        return $this->feel;
    }

    public function setFeel(string $feel): self
    {
        $this->feel = $feel;

        return $this;
    }

    /**
     * @return Collection|Thought[]
     */
    public function getThoughts(): Collection
    {
        return $this->thoughts;
    }

    public function addThought(Thought $thought): self
    {
        if (!$this->thoughts->contains($thought)) {
            $this->thoughts[] = $thought;
            $thought->setColors($this);
        }

        return $this;
    }

    public function removeThought(Thought $thought): self
    {
        if ($this->thoughts->contains($thought)) {
            $this->thoughts->removeElement($thought);
            // set the owning side to null (unless already changed)
            if ($thought->getColors() === $this) {
                $thought->setColors(null);
            }
        }

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
}
