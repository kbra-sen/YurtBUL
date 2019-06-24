<?php

namespace App\Repository;

use App\Entity\Ilce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ilce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ilce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ilce[]    findAll()
 * @method Ilce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IlceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ilce::class);
    }

    // /**
    //  * @return Ilce[] Returns an array of Ilce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ilce
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
