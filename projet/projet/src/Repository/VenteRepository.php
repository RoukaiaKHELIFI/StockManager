<?php

namespace App\Repository;

use App\Entity\Vente;
use Doctrine\DBAL\DBALException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Vente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vente[]    findAll()
 * @method Vente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vente::class);
    }

    // /**
    //  * @return Vente[] Returns an array of Vente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vente
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

// tous les ventes
public function countAll() {
    try {
        $stmt=$this->getEntityManager()
                   ->getConnection()
                   ->prepare("  SELECT count(*) from vente ;   ");
                   $stmt->execute();
                   return $stmt->fetchColumn();
    } catch(DBALException $e) {
        return $e;
    }
   
}

    //vente added this week
    public function countCW() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT COUNT(*) FROM vente where week(created_at)=week(now()); ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
// vente added last week
    public function countLW() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT COUNT(*) FROM vente where week(created_at)=week(now())-1; ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }





    public function countV() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(*) from vente where  created_at = DATE( NOW() );     ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }


public function sumv(){

   
    try {
        $stmt=$this->getEntityManager()
                   ->getConnection()
                   ->prepare(" SELECT sum(prix_u) from vente; ");
                   $stmt->execute();
                   return $stmt->fetchColumn();
    } catch(DBALException $e) {
        return $e;
    }
   
}


public function profit(){

   
    try {
        $stmt=$this->getEntityManager()
                   ->getConnection()
                   ->prepare(" SELECT ( sum(a.total_net) -sum(b.prix_u)) from achats as a , vente as b; ");
                   $stmt->execute();
                   return $stmt->fetchColumn();
    } catch(DBALException $e) {
        return $e;
    }
   
}
    public function count1() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 1;  ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }

    public function count2() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 2;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count3() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) =3;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count4() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 4;  ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count5() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 5;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count6() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 6;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count7() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 7;  ");
           
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count8() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 8;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count9() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 9;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count10() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 10;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count11() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 11;  ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    public function count12() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from vente where extract(month from created_at) = 12;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }

  







}
