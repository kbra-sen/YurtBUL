<?php

namespace App\Repository\Admin;

use App\Entity\Admin\Ayarlar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ayarlar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ayarlar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ayarlar[]    findAll()
 * @method Ayarlar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AyarlarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ayarlar::class);
    }

    // /**
    //  * @return Ayarlar[] Returns an array of Ayarlar objects
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
    public function findOneBySomeField($value): ?Ayarlar
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
