<?php

namespace App\DataFixtures;

use App\Entity\ {
    Article, User, Comment, LikeArticle}
    ;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
    use Doctrine\Common\DataFixtures\DependentFixtureInterface;

    class ArticleFixtures extends Fixture implements DependentFixtureInterface {
        public function load( ObjectManager $manager ): void {

            $articlesData = $this->getArticles();
            $authors = $manager->getRepository( User::class )->findByRole( 'ROLE_AUTHOR' );
            $users = $manager->getRepository( User::class )->findAll();
            $comments = $manager->getRepository( Comment::class )->findAll();

            $nbAuthor = count( $authors );
            $nbUser = count( $users );
            $nbComment = count( $comments );

            // comments
            foreach ( $comments as $comment ) {
                \shuffle( $authors ) ;
                $comment->setUser( $authors[ 0 ] );
                $manager->persist( $comment );
            }
            

            foreach ( $articlesData as $data ) {
                $idAuthor = \random_int( 0, $nbAuthor -1 )  ;
                $article = new Article();
                $article->setTitle( $data[ 'title' ] );
                $article->setContent( $data[ 'content' ] );
                $article->setCreatedAt( $data[ 'createdAt' ] );
                $article->setImage( $data[ 'image' ] );
                $article->setLocation( $data[ 'location' ] );
                $article->setReadCount( $data[ 'readCount' ] );

                // un auteur
                $article->setUser( $authors[ $idAuthor ] ) ;

                // associer des commmentaires
                shuffle( $comments ) ;
                $count = 0 ;
                while( $count < \random_int( 1, $nbComment - 1 ) ) {
                    $article->addComment( $comments[ $count ] );
                    $count++;
                }
                $manager->persist( $article );
                
                // creer des likes , 
                for ($i=0; $i < \random_int( 0, $nbUser -1 ); $i++) { 
                    $user = $users[$i];
                    $likeArticle = new LikeArticle();
                    $likeArticle->setArticle($article);
                    $likeArticle->setUser($user);
                    $manager->persist( $likeArticle );
                }

            }

            $manager->flush();

            


        }

        public function getDependencies() {

            return [
                UserFixtures::class,
                CommentFixtures::class,

            ];
        }

        public function getArticles():array {

            return  $articlesData = [
                [
                    'title' => 'Les dangers des inondations',
                    'content' => 'Les inondations peuvent causer des dommages considérables aux infrastructures et aux habitations, entraînant des pertes économiques importantes.',
                    'createdAt' => new \DateTime( 'now - 3 days' ),
                    'image' => 'image1.jpg',
                    'location' => 'Paris',
                    'readCount' => 10
                ],
                [
                    'title' => 'Prévention des feux de forêt',
                    'content' => 'Il est essentiel de prendre des mesures préventives pour réduire les risques de feux de forêt, notamment en nettoyant les sous-bois et en surveillant les conditions météorologiques.',
                    'createdAt' => new \DateTime( 'now - 11 days' ),
                    'image' => 'image2.jpg',
                    'location' => 'Marseille',
                    'readCount' => 30
                ],
                [
                    'title' => 'Séismes : Comment se préparer ?',
                    'content' => 'Les séismes peuvent survenir sans avertissement, il est donc crucial de se préparer en ayant un plan d\'évacuation et en sécurisant les objets lourds dans les bâtiments.',
                    'createdAt' => new \DateTime('now - 20 days'),
                    'image' => 'image3.jpg',
                    'location' => 'Nice',
                    'readCount' => 22
                ],
                [
                    'title' => 'Les effets des tempêtes sur les côtes',
                    'content' => 'Les tempêtes peuvent provoquer l\'érosion des côtes et des inondations, affectant les écosystèmes côtiers et les communautés locales.',
                    'createdAt' => new \DateTime( 'now - 5 days' ),
                    'image' => 'image4.jpg',
                    'location' => 'Bordeaux',
                    'readCount' => 45
                ],
                [
                    'title' => 'Canicules : Prévention et précautions',
                    'content' => 'Les canicules peuvent être mortelles, surtout pour les personnes vulnérables. Il est important de rester hydraté et de rester à l\'abri de la chaleur excessive.',
                    'createdAt' => new \DateTime('now - 15 days'),
                    'image' => 'image5.jpg',
                    'location' => 'Lyon',
                    'readCount' => 45
                ],
                [
                    'title' => 'Préparation aux ouragans',
                    'content' => 'Les ouragans peuvent causer des destructions massives. Avoir un plan d\'évacuation et un kit d\'urgence prêt peut sauver des vies.',
                    'createdAt' => new \DateTime('now - 25 days'),
                    'image' => 'image6.jpg',
                    'location' => 'La Réunion',
                    'readCount' => 70
                ],
                [
                    'title' => 'Éruptions volcaniques : Que faire ?',
                    'content' => 'Les éruptions volcaniques peuvent être soudaines et violentes. Connaître les routes d\'évacuation et se tenir informé peut faire la différence.',
                    'createdAt' => new \DateTime( 'now - 8 days' ),
                    'image' => 'image7.jpg',
                    'location' => 'Guadeloupe',
                    'readCount' => 1
                ],
                [
                    'title' => 'Tornades : Comprendre les signes avant-coureurs',
                    'content' => 'Les tornades peuvent se former rapidement. Savoir identifier les signes avant-coureurs peut aider à prendre des mesures de protection.',
                    'createdAt' => new \DateTime( 'now - 12 days' ),
                    'image' => 'image8.jpg',
                    'location' => 'Lille',
                    'readCount' => 45
                ],
                [
                    'title' => 'Sécurité en cas d\'avalanche',
                    'content' => 'Les avalanches peuvent être mortelles pour les skieurs et les alpinistes. Connaître les zones à risque et les techniques de survie est crucial.',
                    'createdAt' => new \DateTime('now - 18 days'),
                    'image' => 'image9.jpg',
                    'location' => 'Grenoble',
                    'readCount' => 32
                ],
                [
                    'title' => 'Les impacts des sécheresses',
                    'content' => 'Les sécheresses affectent l\'agriculture, l\'approvisionnement en eau et les écosystèmes. Des mesures de conservation de l\'eau sont essentielles.',
                    'createdAt' => new \DateTime( 'now - 30 days' ),
                    'image' => 'image10.jpg',
                    'location' => 'Toulouse',
                    'readCount' => 18
                ],
                [
                    'title' => 'Les effets des inondations urbaines',
                    'content' => 'Les inondations urbaines peuvent perturber les transports et provoquer des dégâts matériels importants. Une gestion adéquate des eaux pluviales est nécessaire.',
                    'createdAt' => new \DateTime( 'now - 7 days' ),
                    'image' => 'image11.jpg',
                    'location' => 'Paris',
                    'readCount' => 89
                ],
                [
                    'title' => 'Prévention des incendies domestiques',
                    'content' => 'Les incendies domestiques peuvent être dévastateurs. Des détecteurs de fumée et des plans d\'évacuation peuvent sauver des vies.',
                    'createdAt' => new \DateTime('now - 14 days'),
                    'image' => 'image12.jpg',
                    'location' => 'Marseille',
                    'readCount' => 10
                ],
                [
                    'title' => 'Les risques liés aux glissements de terrain',
                    'content' => 'Les glissements de terrain peuvent détruire des habitations et des infrastructures. Connaître les zones à risque et les mesures de prévention est crucial.',
                    'createdAt' => new \DateTime('now - 21 days'),
                    'image' => 'image13.jpg',
                    'location' => 'Nice',
                    'readCount' => 45
                ],
                [
                    'title' => 'Les tempêtes de neige et leurs dangers',
                    'content' => 'Les tempêtes de neige peuvent bloquer les routes et causer des pannes de courant. Il est important de se préparer en cas de tempête.',
                    'createdAt' => new \DateTime('now - 9 days'),
                    'image' => 'image14.jpg',
                    'location' => 'Grenoble',
                    'readCount' => 10
                 ],
                [
                    'title' => 'Sécurité en mer : Prévention des accidents',
                    'content' => 'Les accidents en mer peuvent être évités grâce à une bonne préparation et à l\'utilisation de dispositifs de sécurité appropriés.',
                    'createdAt' => new \DateTime( 'now - 13 days' ),
                    'image' => 'image15.jpg',
                    'location' => 'Bordeaux',
                    'readCount' => 64

                ],
                [
                    'title' => 'Les conséquences des tremblements de terre',
                    'content' => 'Les tremblements de terre peuvent causer des destructions massives et des pertes humaines. La préparation et la construction antisismique sont essentielles.',
                    'createdAt' => new \DateTime( 'now - 19 days' ),
                    'image' => 'image16.jpg',
                    'location' => 'Lyon',
                    'readCount' => 75
                ],
                [
                    'title' => 'Les effets des vagues de chaleur',
                    'content' => 'Les vagues de chaleur peuvent affecter la santé publique, notamment les personnes âgées et les enfants. Des mesures de prévention sont nécessaires.',
                    'createdAt' => new \DateTime( 'now - 27 days' ),
                    'image' => 'image17.jpg',
                    'location' => 'Toulouse',
                    'readCount' => 99
                ],
                [
                    'title' => 'Préparation aux cyclones tropicaux',
                    'content' => 'Les cyclones tropicaux peuvent causer des destructions sur de larges zones. Une préparation adéquate et une évacuation rapide sont cruciales.',
                    'createdAt' => new \DateTime( 'now - 6 days' ),
                    'image' => 'image18.jpg',
                    'location' => 'La Réunion',
                    'readCount' => 75
                ],
                [
                    'title' => 'Les tsunamis : Causes et prévention',
                    'content' => 'Les tsunamis peuvent causer des destructions sur les zones côtières. La surveillance et l\'alerte précoce sont essentielles pour sauver des vies.',
                    'createdAt' => new \DateTime('now - 17 days'),
                    'image' => 'image19.jpg',
                    'location' => 'Guadeloupe',
                    'readCount' => 45
                ],
                [
                    'title' => 'Les impacts des tempêtes de sable',
                    'content' => 'Les tempêtes de sable peuvent affecter la santé et perturber les transports. Des mesures de protection et de prévention sont nécessaires.',
                    'createdAt' => new \DateTime('now - 24 days'),
                    'image' => 'image20.jpg',
                    'location' => 'Lille',
                    'readCount' => 50
                ],
                [
                    'title' => 'Prévention des inondations fluviales',
                    'content' => 'Les inondations fluviales peuvent causer des dommages importants aux infrastructures et aux habitations. Des systèmes de digues et de barrages peuvent aider à les prévenir.',
                    'createdAt' => new \DateTime('now - 4 days'),
                    'image' => 'image21.jpg',
                    'location' => 'Paris',
                    'readCount' => 46
                ],
                [
                    'title' => 'Les conséquences des tempêtes de grêle',
                    'content' => 'Les tempêtes de grêle peuvent causer des dégâts matériels considérables. Il est important de protéger les véhicules et les habitations.',
                    'createdAt' => new \DateTime('now - 10 days'),
                    'image' => 'image22.jpg',
                    'location' => 'Marseille',
                    'readCount' => 80
                ],
                [
                    'title' => 'Les effets des sécheresses prolongées',
                    'content' => 'Les sécheresses prolongées peuvent avoir des impacts sévères sur l\'agriculture et l\'approvisionnement en eau. La gestion durable de l\'eau est cruciale.',
                    'createdAt' => new \DateTime( 'now - 22 days' ),
                    'image' => 'image23.jpg',
                    'author' => 23,
                    'location' => 'Nice',
                    'readCount' => 80
                ],
                [
                    'title' => 'Sécurité en montagne : Éviter les accidents',
                    'content' => 'Les activités en montagne peuvent être dangereuses. Il est important de connaître les risques et de se préparer adéquatement.',
                    'createdAt' => new \DateTime( 'now - 28 days' ),
                    'image' => 'image24.jpg',
                    'location' => 'Grenoble',
                    'readCount' => 108
                ],
                [
                    'title' => 'Les risques liés aux glissements de terrain',
                    'content' => 'Les glissements de terrain peuvent détruire des habitations et des infrastructures. Connaître les zones à risque et les mesures de prévention est crucial.',
                    'createdAt' => new \DateTime( 'now - 11 days' ),
                    'image' => 'image25.jpg',
                    'location' => 'Bordeaux',
                    'readCount' => 42
                ],
                [
                    'title' => 'Les tempêtes de neige et leurs dangers',
                    'content' => 'Les tempêtes de neige peuvent bloquer les routes et causer des pannes de courant. Il est important de se préparer en cas de tempête.',
                    'createdAt' => new \DateTime( 'now - 20 days' ),
                    'image' => 'image26.jpg',
                    'location' => 'Lyon',
                    'readCount' => 25
                ],
                [
                    'title' => 'Les risques de la pollution de l\'air',
                    'content' => 'La pollution de l\'air peut avoir des effets néfastes sur la santé publique. Des mesures de réduction des émissions sont nécessaires.',
                    'createdAt' => new \DateTime( 'now - 16 days' ),
                    'image' => 'image27.jpg',
                    'location' => 'Toulouse',
                    'readCount' => 26
                ],
                [
                    'title' => 'Prévention des accidents industriels',
                    'content' => 'Les accidents industriels peuvent causer des dégâts environnementaux et des pertes humaines. Une bonne gestion des risques et des mesures de sécurité sont essentielles.',
                    'createdAt' => new \DateTime( 'now - 23 days' ),
                    'image' => 'image28.jpg',
                    'location' => 'La Réunion',
                    'readCount' => 56
                ],
                [
                    'title' => 'Les dangers des épidémies',
                    'content' => 'Les épidémies peuvent se propager rapidement et causer des crises sanitaires. La surveillance et les mesures de prévention sont cruciales.',
                    'createdAt' => new \DateTime( 'now - 29 days' ),
                    'image' => 'image29.jpg',
                    'location' => 'Guadeloupe',
                    'readCount' => 4
                ],
                [
                    'title' => 'Les impacts du changement climatique',
                    'content' => 'Le changement climatique peut entraîner des phénomènes météorologiques extrêmes. Des actions globales pour réduire les émissions de carbone sont nécessaires.',
                    'createdAt' => new \DateTime( 'now - 26 days' ),
                    'image' => 'image30.jpg',
                    'location' => 'Lille',
                    'readCount' => 8
                ],
                [
                    'title' => 'Prévention des accidents de la route',
                    'content' => 'Les accidents de la route peuvent être réduits grâce à des mesures de sécurité routière et à une conduite responsable.',
                    'createdAt' => new \DateTime( 'now - 14 days' ),
                    'image' => 'image31.jpg',
                    'location' => 'Paris',
                    'readCount' => 101
                ],
                [
                    'title' => 'Les dangers des maladies infectieuses',
                    'content' => 'Les maladies infectieuses peuvent se propager rapidement. La prévention, la vaccination et une bonne hygiène sont essentielles pour les contrôler.',
                    'createdAt' => new \DateTime( 'now - 21 days' ),
                    'image' => 'image32.jpg',
                    'location' => 'Marseille',
                    'readCount' => 14
                ]
            ];
        }
    }