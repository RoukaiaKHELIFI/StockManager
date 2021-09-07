<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\DBAL\DBALException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }



    //count the number of clients 




    public function countC() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT count(*) from client ;  ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }

    //client added last week
    public function countLW() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT COUNT(*) FROM client where week(created_at)=week(now())-1; ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    //client added this week
    public function countCW() {
        try {
            $stmt=$this->getEntityManager()
                       ->getConnection()
                       ->prepare(" SELECT COUNT(*) FROM client where week(created_at)=week(now()); ");
                       $stmt->execute();
                       return $stmt->fetchColumn();
        } catch(DBALException $e) {
            return $e;
        }
       
    }
    
    // /**
    //  * @return Client[] Returns an array of Client objects
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
    public function findOneBySomeField($value): ?Client
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
