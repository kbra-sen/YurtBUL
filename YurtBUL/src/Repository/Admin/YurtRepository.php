<?php

namespace App\Repository\Admin;

use App\Entity\Admin\Yurt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Yurt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Yurt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Yurt[]    findAll()
 * @method Yurt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YurtRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Yurt::class);
    }

    // /**
    //  * @return Yurt[] Returns an array of Yurt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Yurt
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
