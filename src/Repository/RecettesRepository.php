<?php

namespace App\Repository;

use App\Entity\Recettes;
use App\Entity\RecettesSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method Recettes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recettes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recettes[]    findAll()
 * @method Recettes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecettesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recettes::class);
    }

    /**
     * @return Query
     */


    public function findAllVisibleQuery(RecettesSearch $search)
    {
        $query = $this->findVisibleQuery();

        if ($search->getMaxPrice()) {
            $query = $query
             ->where('r.prixRecette <= :maxprice')
             ->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinPrice()) {
            $query = $query
             ->where('r.prixRecette >= :minprice' )
             ->setParameter('minprice', $search->getMinPrice());
        }

        return $query->getQuery();
    }
    // /**
    //  * @return Recettes[] Returns an array of Recettes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recettes
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
