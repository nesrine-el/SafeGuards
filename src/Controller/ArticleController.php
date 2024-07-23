<?php

namespace App\Controller;

use App\Entity\ {
    Article, Comment}
    ;
    use App\Form\ArticleType;
    use App\Form\CommentType;
    use Doctrine\ORM\EntityManagerInterface;
    use App\Repository\ArticleRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class ArticleController extends AbstractController {

        #[ Route( '/article', name: 'article_index' ) ]

        public function index( ArticleRepository $articleRepository ): Response {
            $articles = $articleRepository->findAll();

            return $this->render( 'article/index.html.twig', [
                'articles' => $articles,
            ] );
        }

        #[ Route( '/article/{id}', name: 'article_show', requirements: [ 'id' => '\d+' ] ) ]

        public function show( Article $article, Request $request, EntityManagerInterface $em ): Response {
            $comment = new Comment();
            $form = $this->createForm( CommentType::class, $comment );
            $comments = $article->getComments();
            $user = $this->getUser() ?? null ;

            $user = $this->getUser();

         /*    if ( !$user ) {
                $this->addFlash( 'error', 'Vous devez être connecté' );
                return $this->redirectToRoute( '' );

            } */

            $form->handleRequest( $request );
            //le form est submit et validé
            if ( $form->isSubmitted() && $form->isValid() ) {
                //le commentaire est relié à l'article
                $comment->setArticle($article) ;
                //le commentaire a été fait à

                $comment->setCreatedAt(new \DateTime('now'));
                 //si le user est connecté alors on persist et flush
                if($user) $comment->setUser($user) ;
                $em->persist( $comment );
                $em->flush();

                $this->addFlash( 'success', 'Comment Created! Knowledge is power!' );
                //$this->addFlash( 'error', 'Login-in or try again' );
                return $this->redirectToRoute('article_show',['id' => $article->getId()]);
            }

            return $this->render( 'article/show.html.twig', [
                'article' => $article,
                'comments' => $comments,
                'form' =>  $form->createView(),
            ] );

        }

        #[ Route( '/article/new', name: 'new' ) ]
        public function new( Request $request, ArticleRepository $articleRepository ): Response {

            $article = new Article();

            $form = $this->createForm( ArticleType::class, $article );

            $form->handleRequest( $request );
            if ( $form->isSubmitted() && $form->isValid() ) {
                $article = $form->getData();
                return $this->redirectToRoute( 'templates/article/new.html.twig' );
            }

            return $this->render( 'article/new.html.twig', [
                'form' => $form,
            ] );

        }

    }
