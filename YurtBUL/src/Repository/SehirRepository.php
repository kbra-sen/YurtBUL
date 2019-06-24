<?php

namespace App\Repository;

use App\Entity\Sehir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sehir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sehir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sehir[]    findAll()
 * @method Sehir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SehirRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sehir::class);
    }

    // /**
    //  * @return Sehir[] Returns an array of Sehir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sehir
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
