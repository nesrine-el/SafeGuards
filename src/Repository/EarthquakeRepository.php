<?php

namespace App\Repository;

use App\Entity\Earthquake;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


/**
 * @extends ServiceEntityRepository<Earthquake>
 */
class EarthquakeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Earthquake::class);
    }

    public function paginationEarthquakes(int $page, int $limit): Paginator {
        return new Paginator($this->createQueryBuilder('e')
        ->setFirstResult(($page ) * $limit)
        ->setMaxResults($limit)
        ->getQuery()
        ->setHint(Paginator::HINT_ENABLE_DISTINCT, false),
        false
    )
    ;
    } 

    //    /**
    //     * @return Earthquake[] Returns an array of Earthquake objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Earthquake
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
