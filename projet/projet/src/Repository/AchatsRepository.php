<?php

namespace App\Repository;

use App\Entity\Achats;
use Doctrine\DBAL\DBALException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Achats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Achats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Achats[]    findAll()
 * @method Achats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Achats::class);
    }

    // /**
    //  * @return Achats[] Returns an array of Achats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
       //purchase added this week
       public function countCW() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT COUNT(*) FROM achats where week(created_at)=week(now()); ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
// purchase added last week
    public function countLW() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT COUNT(*) FROM achats where week(created_at)=week(now())-1; ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
// tous les achats
    public function countAll() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("  SELECT count(*) from achats ;   ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
     //nombre d'achat fait ce jour 
    public function countA() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare("  SELECT count(*) from achats where  created_at = DATE( NOW() );   ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }


    public function suma(){

   
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT sum(total_net) from achats; ");
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 1;  ");
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 2;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) =3;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 4;  ");
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 5;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 6;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 7;  ");
           
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 8;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 9;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 10;  ");
            
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 11;  ");
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
                       ->prepare("   SELECT count(extract(month from created_at)) as 'count' from achats where extract(month from created_at) = 12;  ");
            
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }

  











    /*
    public function findOneBySomeField($value): ?Achats
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
