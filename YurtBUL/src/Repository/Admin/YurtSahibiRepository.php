<?php

namespace App\Repository\Admin;

use App\Entity\Admin\YurtSahibi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method YurtSahibi|null find($id, $lockMode = null, $lockVersion = null)
 * @method YurtSahibi|null findOneBy(array $criteria, array $orderBy = null)
 * @method YurtSahibi[]    findAll()
 * @method YurtSahibi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YurtSahibiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, YurtSahibi::class);
    }

    // /**
    //  * @return YurtSahibi[] Returns an array of YurtSahibi objects
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
    public function findOneBySomeField($value): ?YurtSahibi
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
