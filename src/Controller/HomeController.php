<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Security $security): Response
    {
        if ($security->getUser()) {

            $user = $security->getUser();
        } else {
            $user = "no_user";
        }
      
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user' => $user
        ]);
     }
}
