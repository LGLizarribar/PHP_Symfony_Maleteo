<?php

namespace App\Repository;

use App\Entity\DemoUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemoUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemoUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemoUser[]    findAll()
 * @method DemoUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemoUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemoUser::class);
    }

    // /**
    //  * @return DemoUser[] Returns an array of DemoUser objects
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
    public function findOneBySomeField($value): ?DemoUser
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
