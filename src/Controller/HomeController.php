<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\EarthquakeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Security $security, EarthquakeRepository $earthquakeRepository): Response
    {
      
        $datas=  $this->json([
            ['name' => 'Site 1', 'latitude' => 46.56, 'longitude', 7.3],
            ['name' => 'Site 2', 'latitude' => 44.38, 'longitude', 6.89],
        ]);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'datas' => $datas
        ]);
     }
}
