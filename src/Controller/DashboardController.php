<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/user/{id}/dashboard', name: 'user_dashboard')]
    public function dashboard(int $id, ArticleRepository $articleRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        $articles = $user->getArticles();
        


        $favoriteArticles = ['Article 1', 'Article 2', 'Article 3'];
        $favoriteAuthors = ['Auteur 1', 'Auteur 2', 'Auteur 3'];

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'articles' => $articles,
            'favoriteArticles' => $favoriteArticles,
            'favoriteAuthors' => $favoriteAuthors,
        ]);
    }
}
