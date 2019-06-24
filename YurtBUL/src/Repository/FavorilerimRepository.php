<?php

namespace App\Repository;

use App\Entity\Favorilerim;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Favorilerim|null find($id, $lockMode = null, $lockVersion = null)
 * @method Favorilerim|null findOneBy(array $criteria, array $orderBy = null)
 * @method Favorilerim[]    findAll()
 * @method Favorilerim[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavorilerimRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Favorilerim::class);
    }

    // /**
    //  * @return Favorilerim[] Returns an array of Favorilerim objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Favorilerim
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
