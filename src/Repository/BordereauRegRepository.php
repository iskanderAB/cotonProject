<?php

namespace App\Repository;

use App\Entity\BordereauReg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BordereauReg|null find($id, $lockMode = null, $lockVersion = null)
 * @method BordereauReg|null findOneBy(array $criteria, array $orderBy = null)
 * @method BordereauReg[]    findAll()
 * @method BordereauReg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BordereauRegRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BordereauReg::class);
    }

    // /**
    //  * @return BordereauReg[] Returns an array of BordereauReg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BordereauReg
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
