<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"categories_read"}
 *  }
 * )
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"categories_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"categories_read"})
     * @Assert\NotBlank(message="Le nom de la categorie est obligatoire")
     * @Assert\Length(min=2, minMessage="Le nom de la catégorie doit faire entre 2 et 255 caractères", max=255, maxMessage="Le nom de la catégorie doit faire entre 2 et 255 caractères")
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"categories_read"})
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Painting", mappedBy="category")
     * @Groups({"categories_read"})
     * @ApiSubresource
     */
    private $painting;

    public function __construct()
    {
        $this->painting = new ArrayCollection();
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
     * @return Collection|Painting[]
     */
    public function getPainting(): Collection
    {
        return $this->painting;
    }

    public function addPainting(Painting $painting): self
    {
        if (!$this->painting->contains($painting)) {
            $this->painting[] = $painting;
            $painting->setCategory($this);
        }

        return $this;
    }

    public function removePainting(Painting $painting): self
    {
        if ($this->painting->contains($painting)) {
            $this->painting->removeElement($painting);
            // set the owning side to null (unless already changed)
            if ($painting->getCategory() === $this) {
                $painting->setCategory(null);
            }
        }

        return $this;
    }
}
