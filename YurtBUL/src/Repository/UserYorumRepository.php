<?php

namespace App\Repository;

use App\Entity\UserYorum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserYorum|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserYorum|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserYorum[]    findAll()
 * @method UserYorum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserYorumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserYorum::class);
    }

    // /**
    //  * @return UserYorum[] Returns an array of UserYorum objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserYorum
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
