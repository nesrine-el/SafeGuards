<?php

namespace App\Controller;

use App\Entity\Earthquake;
use App\Repository\EarthquakeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EarthquakeController extends AbstractController
{
    #[Route('/earthquake', name: 'app_earthquake')]
    public function index(): Response
    {
        
        return $this->render('earthquake/index.html.twig', [
            'controller_name' => 'EarthquakeController',
        ]);
    }
   
   
    #[Route('/earthquake/{id}', name: 'earthquake_show', requirements: ['id' => '\d+'])]
    public function show(Earthquake $earthquake): Response
    {

        return $this->render('earthquake/show.html.twig', [
            'earthquake' => $earthquake,
            'controller_name' => 'EarthquakeController',
        ]);
    }
}
