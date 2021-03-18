<?php

namespace App\Repository;

use App\Entity\AssociationVillagoise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AssociationVillagoise|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssociationVillagoise|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssociationVillagoise[]    findAll()
 * @method AssociationVillagoise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssociationVillagoiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssociationVillagoise::class);
    }

    // /**
    //  * @return AssociationVillagoise[] Returns an array of AssociationVillagoise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssociationVillagoise
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
