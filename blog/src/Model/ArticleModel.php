<?php


namespace App\Model;

use App\Entity\Author;
use DateTime;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ArticleModel
 * @package App\Model
 */
class ArticleModel
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = "3",
     *     minMessage = "At least {{ limit }} letters for the title"
     * )
     */
    private $title;

    /**
     * @var string
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = "3",
     *     minMessage = "At least {{ limit }} letters for the subtitle"
     * )
     */
    private $subtitle;

    /**
     * @var string
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = "3",
     *     minMessage = "At least {{ limit }} letters for the content"
     * )
     */
    private $content;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var Author
     */
    private $author;

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @param Uuid $id
     * @return $this
     */
    public function setId(Uuid $id): ArticleModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): ArticleModel
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * @param string|null $subtitle
     * @return $this
     */
    public function setSubtitle(?string $subtitle): ArticleModel
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): ArticleModel
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(DateTime $createdAt): ArticleModel
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     * @return $this
     */
    public function setAuthor(Author $author): ArticleModel
    {
        $this->author = $author;
        return $this;
    }
}