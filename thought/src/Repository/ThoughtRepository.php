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
            ->orderBy('t.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
    /**
     * Cette fonction nous permet de récupere les thought du mois
     * @param integer $limit par défaut il est régler à 10
     * @return Thought[] Returns an array of Thought objects
     */

    public function findCurrentMonth()
    {
        // on instancie la date 
        // a laquelle on vas récupere le jour
        $date = new \DateTime();
        $day = $date->format('d') ;

        // on instancier une date de début 
        // on partant de la date du jour et en lui retirant le nombre de jour deja effectuer
        $beginDate = new \DateTime();
        $beginDate->modify('-'.$day.' day');
        
        // on prend la date du jour et on ajoute un mois 
        $endDate =  new \DateTime();
        $endDate->modify('+1 month');
       

         //dd($day, $beginDate, $endDate);

           return $this->createQueryBuilder('t')
            ->join('t.colors', 'c')
            ->addSelect('t, c')
            ->where('t.createdAt > :begin')
            ->andWhere('t.createdAt < :end')
            ->setParameter('begin', $beginDate)
            ->setParameter('end', $endDate)
            ->orderBy('t.createdAt', 'DESC')
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
