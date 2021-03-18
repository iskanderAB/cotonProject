<?php

namespace App\Repository;

use App\Entity\CentreGestInt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CentreGestInt|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreGestInt|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreGestInt[]    findAll()
 * @method CentreGestInt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreGestIntRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentreGestInt::class);
    }

    // /**
    //  * @return CentreGestInt[] Returns an array of CentreGestInt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CentreGestInt
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
