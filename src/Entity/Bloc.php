<?php

// src/Entity/Bloc.php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Bloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'bloc', targetEntity: ContentElement::class, cascade: ['persist', 'remove'])]
    private $contentElements;

    #[ORM\ManyToOne(targetEntity: Page::class, inversedBy: 'blocs')]
    #[ORM\JoinColumn(nullable: false)]
    private $page;

    public function __construct()
    {
        $this->contentElements = new ArrayCollection();
    }

    // Getters et Setters

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

    /**
     * @return Collection|ContentElement[]
     */
    public function getContentElements(): Collection
    {
        return $this->contentElements;
    }

    public function addContentElement(ContentElement $contentElement): self
    {
        if (!$this->contentElements->contains($contentElement)) {
            $this->contentElements[] = $contentElement;
            $contentElement->setBloc($this);
        }

        return $this;
    }

    public function removeContentElement(ContentElement $contentElement): self
    {
        if ($this->contentElements->removeElement($contentElement)) {
            // set the owning side to null (unless already changed)
            if ($contentElement->getBloc() === $this) {
                $contentElement->setBloc(null);
            }
        }

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

    public function __toString(): string
    {
        return $this->name . ' (Bloc ID: ' . $this->id . ')';
    }
}

