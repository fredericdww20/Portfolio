<?php

namespace App\Entity;

use App\Repository\ContentElementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentElementRepository::class)]
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

    #[ORM\ManyToOne(targetEntity: Page::class, inversedBy: 'contentElements')]
    #[ORM\JoinColumn(nullable: false)]
    private $page;

    // Getters and Setters

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
}
