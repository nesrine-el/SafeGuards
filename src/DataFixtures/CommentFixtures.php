<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Comment;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       
        $commentsData = [
            [
                'content' => 'Cet article est très instructif sur les inondations. Merci pour les conseils !', 
                'createdAt' => 'now - 3 hours', 
           ],
            [
                'content' => 'Je n\'étais pas au courant des mesures préventives pour les feux de forêt, merci !', 
                'createdAt' => 'now - 5 hours'
            ],
            [
                'content' => 'La préparation aux séismes est cruciale, bon article.', 
                'createdAt' => 'now - 1 day'
            ],
            [
                'content' => 'Les tempêtes côtières ont des effets dévastateurs. Article bien rédigé.', 
                'createdAt' => 'now - 2 days'
            ],
            [
                'content' => 'Rester hydraté durant les canicules est essentiel, merci pour le rappel.', 
                'createdAt' => 'now - 4 days'
            ],
            [
                'content' => 'Les ouragans nécessitent une préparation sérieuse. Merci pour cet article.', 
                'createdAt' => 'now - 6 days'
            ],
            [
                'content' => 'Les éruptions volcaniques sont imprévisibles. Merci pour les conseils.', 
                'createdAt' => 'now - 1 week'
            ],
            [
                'content' => 'Savoir identifier les signes avant-coureurs des tornades est vital.', 
                'createdAt' => 'now - 8 days'
            ],
            [
                'content' => 'Les avalanches sont dangereuses, merci pour cet article détaillé.', 
                'createdAt' => 'now - 9 days'
            ],
            [
                'content' => 'Les sécheresses ont des impacts énormes. Article très informatif.', 
                'createdAt' => 'now - 10 days'
            ]
        ];


        foreach ($commentsData as $comment) {
            $c = new Comment;
            $c-> setContent($comment['content']);
            $c-> setCreatedAt(new \DateTime($comment['createdAt']));
            $manager->persist($c);
        }


        $manager->flush();
    }
    
}


