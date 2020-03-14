<?php

namespace App\Repository;

use App\Entity\ColorFeel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ColorFeel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorFeel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorFeel[]    findAll()
 * @method ColorFeel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorFeelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorFeel::class);
    }

    // /**
    //  * @return ColorFeel[] Returns an array of ColorFeel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ColorFeel
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
