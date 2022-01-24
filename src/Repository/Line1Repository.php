<?php

namespace App\Repository;

use App\Entity\Line1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Line1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Line1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Line1[]    findAll()
 * @method Line1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Line1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Line1::class);
    }

    // /**
    //  * @return Line1[] Returns an array of Line1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Line1
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
