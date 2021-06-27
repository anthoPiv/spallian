<?php


namespace App\Factory;


use App\Entity\Article;
use App\Model\ArticleModel;
use DateTime;

class ArticleFactory
{
    /**
     * @return Article
     */
    public function createArticle(): Article
    {
        return new Article;
    }

    /**
     * @return ArticleModel
     */
    public function createArticleModel(): ArticleModel
    {
        return new ArticleModel;
    }

    /**
     * @param ArticleModel $articleModel
     * @return Article
     */
    public function create(ArticleModel $articleModel): Article
    {
        $article = $this->createArticle();

        return $article->setTitle($articleModel->getTitle())
            ->setSubtitle($articleModel->getSubtitle())
            ->setContent($articleModel->getContent())
            ->setAuthor($articleModel->getAuthor())
            ->setCreatedAt(new DateTime);
    }

    /**
     * @param Article $article
     * @return ArticleModel
     */
    public function editArticleModel(Article $article): ArticleModel
    {
        $articleModel = $this->createArticleModel();

        return $articleModel->setId($article->getId())
            ->setTitle($article->getTitle())
            ->setSubtitle($article->getSubtitle())
            ->setContent($article->getContent())
            ->setAuthor($article->getAuthor());
    }

    /**
     * @param Article $article
     * @param ArticleModel $articleModel
     * @return Article
     */
    public function editArticle(Article $article, ArticleModel $articleModel): Article
    {
        return $article->setTitle($articleModel->getTitle())
            ->setSubtitle($articleModel->getSubtitle())
            ->setContent($articleModel->getContent())
            ->setAuthor($articleModel->getAuthor());
    }
}