<?php

namespace App\Repository;

use App\Entity\PrixVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrixVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrixVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrixVente[]    findAll()
 * @method PrixVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrixVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrixVente::class);
    }

    // /**
    //  * @return PrixVente[] Returns an array of PrixVente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrixVente
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
