<?php

namespace App\Repository;

use App\Entity\Statu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Statu>
 *
 * @method Statu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statu[]    findAll()
 * @method Statu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statu::class);
    }

//    /**
//     * @return Statu[] Returns an array of Statu objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Statu
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
