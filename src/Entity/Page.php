<?php

// src/Entity/Page.php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $slug;

    // Relation pour plusieurs Blocs
    #[ORM\OneToMany(mappedBy: 'page', targetEntity: Bloc::class, cascade: ['persist', 'remove'])]
    private $blocs;

    // Relation pour plusieurs ContentElements individuels
    #[ORM\OneToMany(mappedBy: 'page', targetEntity: ContentElement::class, cascade: ['persist', 'remove'])]
    private $contentElements;

    public function __construct()
    {
        $this->blocs = new ArrayCollection();
        $this->contentElements = new ArrayCollection();
    }

    // Getters et Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Bloc[]
     */
    public function getBlocs(): Collection
    {
        return $this->blocs;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->blocs->contains($bloc)) {
            $this->blocs[] = $bloc;
            $bloc->setPage($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        if ($this->blocs->removeElement($bloc)) {
            // set the owning side to null (unless already changed)
            if ($bloc->getPage() === $this) {
                $bloc->setPage(null);
            }
        }

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
            $contentElement->setPage($this);
        }

        return $this;
    }

    public function removeContentElement(ContentElement $contentElement): self
    {
        if ($this->contentElements->removeElement($contentElement)) {
            // set the owning side to null (unless already changed)
            if ($contentElement->getPage() === $this) {
                $contentElement->setPage(null);
            }
        }

        return $this;
    }
}
