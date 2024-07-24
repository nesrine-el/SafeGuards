<?php

namespace App\Repository;

use App\Entity\LikeArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LikeArticle>
 */
class LikeArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LikeArticle::class);
    }

    //    /**
    //     * @return LikeArticle[] Returns an array of LikeArticle objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LikeArticle
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function findByArticleAndUser(int $id_user, int $id_article): ?LikeArticle
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.user = :user_id  ')
            ->andWhere('l.article = :article_id  ')
            ->setParameter('user_id', $id_user)
            ->setParameter('article_id', $id_article)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
