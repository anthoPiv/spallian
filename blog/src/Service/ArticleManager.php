<?php

namespace App\Service;

use App\Entity\Article;

use App\Factory\ArticleFactory;
use App\Model\ArticleModel;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ArticleManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    /**
     * @var ArticleFactory
     */
    private $articleFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        PaginatorInterface $paginator,
        ArticleFactory $articleFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->paginator = $paginator;
        $this->articleFactory = $articleFactory;
    }

    /**
     * @param Request $request
     * @return PaginationInterface
     */
    public function getArticles(Request $request): PaginationInterface
    {
        $articles = $this->entityManager->getRepository(Article::class)->getArticles();

        return $this->paginator->paginate($articles, $request->query->getInt('page', 1), 10);
    }

    /**
     * @return ArticleModel
     */
    public function createArticleModel(): ArticleModel
    {
        return $this->articleFactory->createArticleModel();
    }

    /**
     * @param ArticleModel $articleModel
     */
    public function new(ArticleModel $articleModel): void
    {
        $article = $this->articleFactory->create($articleModel);

        $this->entityManager->persist($article);
        $this->entityManager->flush();
    }

    /**
     * @param Article $article
     * @param ArticleModel $articleModel
     * @return Article
     */
    public function editArticle(Article $article, ArticleModel $articleModel): Article
    {
        return $this->articleFactory->editArticle($article, $articleModel);
    }

    /**
     * @param Article $article
     * @return ArticleModel
     */
    public function editArticleModel(Article $article): ArticleModel
    {
        return $this->articleFactory->editArticleModel($article);
    }

    /**
     * @param Article $article
     */
    public function update(Article $article): void
    {
        $this->entityManager->persist($article);
        $this->entityManager->flush();
    }

    /**
     * @param Article $article
     */
    public function remove(Article $article): void
    {
        $this->entityManager->remove($article);
        $this->entityManager->flush();
    }
}