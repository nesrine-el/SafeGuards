<?php

namespace App\Controller;

use App\Entity\{
    Article,
    Comment
};
use App\Form\ArticleType;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ArticleRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'article_index')]
    public function index(ArticleRepository $articleRepository, Request $request): Response
    {
        $search = $request->query->get('search', '');

        if ($search) {
            $articles = $articleRepository->createQueryBuilder('a')
                ->where('a.title LIKE :search OR a.content LIKE :search')
                ->setParameter('search', '%' . $search . '%')
                ->getQuery()
                ->getResult();
        } else {
            $articles = $articleRepository->findAll();
        }

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'search' => $search,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', requirements: ['id' => '\d+'])]
    public function show(Article $article, Request $request, EntityManagerInterface $em): Response
    {
        
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $comments = $article->getComments();
        $user = $this->getUser() ?? null;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setArticle($article);

            $comment->setCreatedAt(new \DateTime('now'));
            if ($user) $comment->setUser($user);
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Comment Created! Knowledge is power!');

            return $this->redirectToRoute('article_show', ['id' => $article->getId()]);
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
    
            'comments' => $comments,
            'form' =>  $form->createView(),
        ]);
    }


    #[Route('/article/new', name: 'article_new')]
    #[IsGranted('new')]
    public function new(Request $request, ArticleRepository $articleRepository, EntityManagerInterface $em): Response
    {

        $article = new Article();
        $user = $this->getUser();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $article = $form->getData();
            $article->setCreatedAt(new \DateTime( 'now ' ));
            $article->setUser($user);
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', ['id' => $article->getId()]);

        }

      

        return $this->render('article/new.html.twig', [
            'form' => $form,
         

        ]);
    }
}
