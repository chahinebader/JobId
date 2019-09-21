<?php
namespace UserBundle\Repository;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    function findGraphistes(){
        $query=$this->createQueryBuilder('s');
        $query->where("s.freelancer=:graphiste")->setParameter('graphiste','1');
        return $query->getQuery()->getResult();
    }

    function query(){
        $query=$this->createQueryBuilder('s');
        $query->where("s.freelancer=:graphiste")->setParameter('graphiste','1');
        return $query;
    }


    function findGraphistesByNiveau1(){
        $query=$this->getEntityManager()
            ->createQuery("
                     select d from UserBundle:User d,
                     NiveauBundle:Niveau n 
                     where d.niveau = n.id
                     and n.niveau='Graphiste - Niveau 1'
                     and d.freelancer='1'
                        ");
        return $query->getResult();
    }


    function findGraphistesByNiveau2(){
        $query=$this->getEntityManager()
            ->createQuery("
                     select d from UserBundle:User d,
                     NiveauBundle:Niveau n 
                     where d.niveau = n.id
                     and n.niveau='Graphiste - Niveau 2'
                     and d.freelancer='1'
                        ");
        return $query->getResult();
    }

    function findGraphistesByNiveau3(){
        $query=$this->getEntityManager()
            ->createQuery("
                     select d from UserBundle:User d,
                     NiveauBundle:Niveau n 
                     where d.niveau = n.id
                     and n.niveau='Graphiste - Niveau 3'
                     and d.freelancer='1'
                        ");
        return $query->getResult();
    }



 // Chahine part
    function GetTotalUsers()
    {
        $entityManager = $this->getEntityManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('count(account.id)');
        $qb->from('UserBundle:User','account');


       return $count = $qb->getQuery()->getSingleScalarResult();

    }
    function GetTotalUsersFreelancers()
    {
        $entityManager = $this->getEntityManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('count(account.id)');
        $qb->from('UserBundle:User','account');
        $qb->where('account.freelancer = true');


        return $count = $qb->getQuery()->getSingleScalarResult();

    }
    function GetTotalUsersBanned()
    {
        $entityManager = $this->getEntityManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('count(account.id)');
        $qb->from('UserBundle:User','account');
        $qb->where('account.enabled = false' ) ;

        return $count = $qb->getQuery()->getSingleScalarResult();
    }
    function GetTotalUsersNotBanned()
    {
        $entityManager = $this->getEntityManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('count(account.id)');
        $qb->from('UserBundle:User','account');
        $qb->where('account.enabled= true' ) ;

        return $count = $qb->getQuery()->getSingleScalarResult();
    }
/*   function GetTotalUsersLevelone()
    {
        $query = $this->getEntityManager()
            ->createQuery("
                     select COUNT(n) from NiveauBundle:Niveau n,
                     where and n.niveau='Graphiste - Niveau 1'
                        ");
        return $query->getSingleScalarResult();;
    }
    function GetTotalUsersLeveltwo()
    {
        $query = $this->getEntityManager()
            ->createQuery("
                     select COUNT(n) from NiveauBundle:Niveau n,                     
                     where and n.niveau='Graphiste - Niveau 2'
                        ");
        return $query->getSingleScalarResult();;
    }
    function GetTotalUsersLevelthree()
    {
        $query = $this->getEntityManager()
            ->createQuery("
                     select COUNT(n) from NiveauBundle:Niveau n,                     
                     where and n.niveau='Graphiste - Niveau 3'
                        ");
        return $query->getSingleScalarResult();;
    }*/







}
