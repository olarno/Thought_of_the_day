<?php

namespace App\Repository;

use App\Entity\Thought;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Thought|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thought|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thought[]    findAll()
 * @method Thought[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThoughtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thought::class);
    }

    /**
     * @return Thought[] Returns all Thought objects
     */

    public function findAllComplete()
    {
        return $this->createQueryBuilder('t')
            ->join('t.colors', 'c')
            ->addSelect('t, c')
            ->orderBy('t.createdAt')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Thought Returns an single complete Thought objects
     */

    public function findComplete($id)
    {
        return $this->createQueryBuilder('t')
            ->join('t.colors', 'c')
            ->addSelect('t, c')
            ->where('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * Cette fonction nous permete de récuperer les 10 dernières entrées 
     * @param integer $limit par défaut il est régler à 10
     * @return Thought[] Returns an array of Thought objects
     */

    public function findTenLastComplete($limit = 10)
    {
        return $this->createQueryBuilder('t')
            ->join('t.colors', 'c')
            ->addSelect('t, c')
            ->orderBy('t.createdAt')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
    /**
     * Cette fonction nous permete de récuperer les 10 dernières entrées 
     * @param integer $limit par défaut il est régler à 10
     * @return Thought[] Returns an array of Thought objects
     */

    public function findCurrentMonth()
    {
        $month = new \DateTime();

        return $this->createQueryBuilder('t')
            ->join('t.colors', 'c')
            ->addSelect('t, c')
            ->where('t.createdAt = :month')
            ->setParameter('month', $month)
            ->getQuery()
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Thought
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
