<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'article_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', requirements: ['id' => '\d+'])]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
    #[Route('/article/new', name: 'new')]
    public function new(Request $request, ArticleRepository $articleRepository): Response
    {

              $article = new Article();

              $form = $this->createForm(ArticleType::class, $article);
      
              $form->handleRequest($request);
              if ($form->isSubmitted() && $form->isValid()) {
                  // $form->getData() holds the submitted values
                  // but, the original `$task` variable has also been updated
                  $article = $form->getData();
      
                  // ... perform some action, such as saving the task to the database
      
                  return $this->redirectToRoute('templates/article/new.html.twig');
              }
      
              return $this->render('article/new.html.twig', [
                  'form' => $form,
              ]);
  
    }

}
