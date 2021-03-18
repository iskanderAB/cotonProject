<?php

namespace App\Repository;

use App\Entity\BordereauLiv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BordereauLiv|null find($id, $lockMode = null, $lockVersion = null)
 * @method BordereauLiv|null findOneBy(array $criteria, array $orderBy = null)
 * @method BordereauLiv[]    findAll()
 * @method BordereauLiv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BordereauLivRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BordereauLiv::class);
    }

    // /**
    //  * @return BordereauLiv[] Returns an array of BordereauLiv objects
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
    public function findOneBySomeField($value): ?BordereauLiv
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
