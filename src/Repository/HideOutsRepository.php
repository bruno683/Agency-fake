<?php

namespace App\Repository;

use App\Entity\HideOuts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HideOuts|null find($id, $lockMode = null, $lockVersion = null)
 * @method HideOuts|null findOneBy(array $criteria, array $orderBy = null)
 * @method HideOuts[]    findAll()
 * @method HideOuts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HideOutsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HideOuts::class);
    }

    // /**
    //  * @return HideOuts[] Returns an array of HideOuts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HideOuts
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
