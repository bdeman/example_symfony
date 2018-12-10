<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=0, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=0, nullable=false)
     */
    private $body;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="aritcles_tags",joinColumns={@ORM\JoinColumn(name="article_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *     )
     */
    private $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

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

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getTags() {
        return $this->tags;
    }


}
