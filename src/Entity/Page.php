<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: PageRepository::class)]
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

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: ContentElement::class, cascade: ['persist', 'remove'])]
    private $contentElements;

    public function __construct()
    {
        $this->contentElements = new ArrayCollection();
    }

    // Getters and Setters

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