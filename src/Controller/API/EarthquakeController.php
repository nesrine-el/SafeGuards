<?php

namespace App\Controller\API;

use App\Entity\Earthquake;
use App\Services\ModelEarthquakes;
use App\Repository\EarthquakeRepository;
use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class EarthquakeController extends AbstractController
{
    #[Route('/api/earthquakes', name: 'app_api_earthquakes')]
    public function index(EarthquakeRepository $earthquakeRepository, Request $request)
    {
        //$earthquakes = $earthquakeRepository->findAll();
        $earthquakes = $earthquakeRepository->paginationEarthquakes($request->query->getInt(key: 'page', default:0), 1000);
        return $this->json($earthquakes, 200, [], [
            'groups' => ['earthquakes.index']
        ]);
    }
   
    #[Route('/api/earthquakes/{id}', name: 'app_api_earthquakes_show', requirements: ['id' => Requirement::DIGITS])]
    public function show(Earthquake $e) {
        return $this->json($e,200,[],[
            'groups' => ['earthquakes.index', 'earthquakes.show'],
        ]);
    }


    #[Route('/api/earthquakes/prediction/lat/{lat}/long/{long}', name: 'app_api_earthquakes_predict')]
    public function predict($lat, $long) {

        $model = new ModelEarthquakes(new PDO('mysql:host=127.0.0.1; dbname=SafeGuards', 'root', 'root'));


        $model->loadSavedModel('earthquakes_model_66.rbx');
        $value = $model->predict($lat, $long);
        return $this->json($value);
        
    }
}
