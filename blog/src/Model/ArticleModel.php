<?php


namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ArticleModel
{
    private $id;

    /**
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = "3",
     *     minMessage = "At least {{ limit }} letters for the title"
     * )
     */
    private $title;

    /**
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = "3",
     *     minMessage = "At least {{ limit }} letters for the subtitle"
     * )
     */
    private $subtitle;

    /**
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = "3",
     *     minMessage = "At least {{ limit }} letters for the content"
     * )
     */
    private $content;

    private $createdAt;

    private $author;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ArticleModel
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return ArticleModel
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     * @return ArticleModel
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return ArticleModel
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return ArticleModel
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return ArticleModel
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
}