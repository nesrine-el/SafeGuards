<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Earthquake;
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
    public function index(Security $security, EarthquakeRepository $earthquakeRepository , PaginatorInterface $paginator, Request $request): Response
    {

        $query = $earthquakeRepository->findAll();
    
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
    
 
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pagination' => $pagination

        ]);
     }
}
