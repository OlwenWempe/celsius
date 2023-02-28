<?php

namespace App\Repository;

use App\Entity\DonneurDOrdre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DonneurDOrdre>
 *
 * @method DonneurDOrdre|null find($id, $lockMode = null, $lockVersion = null)
 * @method DonneurDOrdre|null findOneBy(array $criteria, array $orderBy = null)
 * @method DonneurDOrdre[]    findAll()
 * @method DonneurDOrdre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonneurDOrdreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DonneurDOrdre::class);
    }

    public function save(DonneurDOrdre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DonneurDOrdre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DonneurDOrdre[] Returns an array of DonneurDOrdre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DonneurDOrdre
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
