<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paintings", mappedBy="category")
     */
    private $paintings;

    public function __construct()
    {
        $this->paintings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Paintings[]
     */
    public function getPaintings(): Collection
    {
        return $this->paintings;
    }

    public function addPainting(Paintings $painting): self
    {
        if (!$this->paintings->contains($painting)) {
            $this->paintings[] = $painting;
            $painting->setCategory($this);
        }

        return $this;
    }

    public function removePainting(Paintings $painting): self
    {
        if ($this->paintings->contains($painting)) {
            $this->paintings->removeElement($painting);
            // set the owning side to null (unless already changed)
            if ($painting->getCategory() === $this) {
                $painting->setCategory(null);
            }
        }

        return $this;
    }
}
