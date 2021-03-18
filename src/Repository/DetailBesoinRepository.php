<?php

namespace App\Repository;

use App\Entity\DetailBesoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DetailBesoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailBesoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailBesoin[]    findAll()
 * @method DetailBesoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailBesoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailBesoin::class);
    }

    // /**
    //  * @return DetailBesoin[] Returns an array of DetailBesoin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetailBesoin
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
