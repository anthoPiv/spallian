<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Service\ArticleManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ArticleController
 * @package App\Controller
 * @Route("/articles")
 */
class ArticleController extends AbstractController
{
    /**
     * @var ArticleManager
     */
    private $articleManager;

    public function __construct(
        ArticleManager $articleManager
    )
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @Route("/show", name="articles_show")
     */
    public function show(Request $request): Response
    {
        $articles = $this->articleManager->getArticles($request);

        return $this->render('articles/articles.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/new", name="articles_new")
     */
    public function new(Request $request): Response
    {
        $articleModel = $this->articleManager->createArticleModel();

        $form = $this->createForm(ArticleType::class, $articleModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->articleManager->new($articleModel);

            $this->addFlash('success', 'Article added successfully');

            return $this->redirectToRoute('articles_show');
        }

        return $this->render('articles/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return Response
     * @Route("/edit/{id}", name="articles_edit")
     */
    public function edit(Request $request, Article $article): Response
    {
        $articleModel = $this->articleManager->editArticleModel($article);

        $form = $this->createForm(ArticleType::class, $articleModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $this->articleManager->editArticle($article, $articleModel);

            $this->articleManager->update($article);

            $this->addFlash('success', 'Article updated successfully');

            return $this->redirectToRoute('articles_show');
        }

        return $this->render('articles/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Article $article
     * @return Response
     * @Route("/delete/{id}", name="articles_delete")
     */
    public function delete(Article $article): Response
    {
        $this->articleManager->remove($article);

        $this->addFlash('success', 'Article deleted successfully');

        return $this->redirectToRoute('articles_show');
    }
}
