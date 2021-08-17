<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TestResults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestResults|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestResults|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestResults[]    findAll()
 * @method TestResults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestResultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestResults::class);
    }

    // /**
    //  * @return TestResults[] Returns an array of TestResults objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestResults
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
