<?php

namespace App\Repository;

use App\Entity\Recettes;
use App\Entity\RecettesSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
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
             ->andwhere('r.prixRecette <= :maxprice')
             ->setParameter('maxprice', $search->getMaxPrice());
        }
    
        if ($search->getMinPrice()) {
            $query = $query
             ->andwhere('r.prixRecette >= :minprice' )
             ->setParameter('minprice', $search->getMinPrice());
        }


        return $query->getQuery();
    }
    

    

     private function findVisibleQuery()
     {
        return $this->createQueryBuilder('r')
                     ->orderBy('r.updated_at','DESC');
       
     }

    private function lastReceipe()
    {
        
    }

    
   
}
  
  


