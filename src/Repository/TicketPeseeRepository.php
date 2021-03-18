<?php

namespace App\Repository;

use App\Entity\TicketPesee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketPesee|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketPesee|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketPesee[]    findAll()
 * @method TicketPesee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketPeseeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketPesee::class);
    }

    // /**
    //  * @return TicketPesee[] Returns an array of TicketPesee objects
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
    public function findOneBySomeField($value): ?TicketPesee
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
