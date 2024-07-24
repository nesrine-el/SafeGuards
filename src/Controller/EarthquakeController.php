<?php

namespace App\Controller;

use App\Entity\Earthquake;
use App\Repository\EarthquakeRepository;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EarthquakeController extends AbstractController
{
    #[Route('/earthquake', name: 'app_earthquake')]
    public function index(EarthquakeRepository $earthquakeRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $queryBuilder = $earthquakeRepository->createQueryBuilder('e');

        $pagination = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            10 /* limit per page */
        );

        return $this->render('earthquake/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
   
   
    #[Route('/earthquake/{id}', name: 'earthquake_show', requirements: ['id' => '\d+'])]
    public function show(Earthquake $earthquake, ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

         

        return $this->render('earthquake/show.html.twig', [
            'earthquake' => $earthquake,
            'controller_name' => 'EarthquakeController',
            'articles' => $articles,
        ]);
    }
    #[Route('/earthquake/prevention', name: 'earthquake_prevention')]
    public function prevention(): Response
    {
        
        return $this->render('earthquake/prevention.html.twig', [
            'controller_name' => 'EarthquakeController',
        ]);
    }

    #[Route('/earthquake/map', name: 'earthquake_map')]
    public function map(): Response
    {
        
        return $this->render('earthquake/map.html.twig', [
            'controller_name' => 'EarthquakeController',
        ]);
    }
   
}
