<?php

namespace App\Repository;

use App\Entity\Glossary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Glossary>
 *
 * @method Glossary|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glossary|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glossary[]    findAll()
 * @method Glossary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossaryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Glossary::class);
    }

//    /**
//     * @return Glossary[] Returns an array of Glossary objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Glossary
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
