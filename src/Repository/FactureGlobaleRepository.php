<?php

namespace App\Repository;

use App\Entity\FactureGlobale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FactureGlobale|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactureGlobale|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactureGlobale[]    findAll()
 * @method FactureGlobale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureGlobaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactureGlobale::class);
    }

    // /**
    //  * @return FactureGlobale[] Returns an array of FactureGlobale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FactureGlobale
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
