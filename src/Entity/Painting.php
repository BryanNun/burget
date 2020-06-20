<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaintingRepository")
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"paintings_read"}
 *  }
 * )
 */
class Painting
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"paintings_read", "categories_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"paintings_read", "categories_read"})
     * @Assert\NotBlank(message="L'image du tableau est obligatoire")
     */
    private $picture;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"paintings_read"})
     */
    private $descrition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"paintings_read", "categories_read"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\category", inversedBy="painting")
     * @Groups({"paintings_read"})
     */
    private $category;

    /**
     * @ORM\Column(type="boolean", options={"default": true})
     */
    private $online;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescrition(): ?string
    {
        return $this->descrition;
    }

    public function setDescrition(?string $descrition): self
    {
        $this->descrition = $descrition;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }
}
