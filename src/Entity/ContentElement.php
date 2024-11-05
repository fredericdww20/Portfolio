<?php

// src/Entity/ContentElement.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class ContentElement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $type; // e.g., 'title', 'description', 'image'

    #[ORM\Column(type: 'text', nullable: true)]
    private $value; // Content value (text, URL for image, etc.)

    // Relation optionnelle avec une Page
    #[ORM\ManyToOne(targetEntity: Page::class, inversedBy: 'contentElements')]
    private $page;

    // Relation optionnelle avec un Bloc
    #[ORM\ManyToOne(targetEntity: Bloc::class, inversedBy: 'contentElements')]
    private $bloc;

    // Getters et Setters

    public function getId(): ?int
    {
        return $this->id;
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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getBloc(): ?Bloc
    {
        return $this->bloc;
    }

    public function setBloc(?Bloc $bloc): self
    {
        $this->bloc = $bloc;

        return $this;
    }

    public function __toString(): string
    {
        return $this->type . ' (ID: ' . $this->id . ')';
    }
}
