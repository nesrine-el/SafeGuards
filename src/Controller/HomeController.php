<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Earthquake;
use App\Repository\ArticleRepository;
use App\Repository\EarthquakeRepository;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Security $security, EarthquakeRepository $earthquakeRepository , PaginatorInterface $paginator, Request $request, ArticleRepository $articleRepository): Response
    {
        
        $earthquakes = $earthquakeRepository->findAll();
        $SortedByReadArticles = $articleRepository->sortByReadCount();
        $MostLikedArticles = $articleRepository->sortByLikes();
 
        $pagination = $paginator->paginate(
            $earthquakes, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pagination' => $pagination,
            'readarticles' => $SortedByReadArticles,
            'likedarticles' => $MostLikedArticles,

        ]);

    }
   
   #[Route('/api/doc', name: 'doc_api')]
    public function doc(): Response
    {
     
        return $this->render('api/doc.html.twig', [
           'controller_name' => 'HomeController',
        ]);
    }

}

