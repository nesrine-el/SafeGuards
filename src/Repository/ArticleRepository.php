<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    //    /**
    //     * @return Article[] Returns an array of Article objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Article
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

     public function sortByReadCount(): array
        {
            $qb = $this->createQueryBuilder('a')
            ->orderBy('a.readCount', 'ASC');
            ;

            $query = $qb->getQuery();
            return $query->execute();
        } 

     public function sortByLikes(): array
        {
            $qb = $this->createQueryBuilder('a')
            ->orderBy('a.readCount', 'ASC');
            ;
/*             SELECT article.title, article.content, COUNT(like_article.article_id) as count
FROM article
JOIN like_article ON like_article.article_id = article.id 
GROUP BY article.title, article.id
ORDER BY count; */

            $query = $qb->getQuery();
            return $query->execute();
        } 

}
