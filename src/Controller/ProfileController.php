<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'user_profile')]
    public function profile(int $id, ArticleRepository $articleRepository, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'utilisateur par son ID
        $user = $entityManager->getRepository(User::class)->find($id);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'articles' => $user->getArticles(),
        ]);
    }
}
