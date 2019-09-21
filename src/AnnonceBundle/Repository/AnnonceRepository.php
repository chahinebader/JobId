<?php
namespace AnnonceBundle\Repository;
use Doctrine\ORM\EntityRepository;

class AnnonceRepository extends EntityRepository
{
    function findAnnonceByUser($id){
        $query=$this->createQueryBuilder('s');
        $query->where("s.user=:user")->setParameter('user',$id);
        return $query->getQuery()->getResult();
    }

    function AugumenterNbVue($id){
        $query=$this->getEntityManager()
            ->createQuery("
             UPDATE AnnonceBundle:Annonce a
             SET a.nbVues = a.nbVues + 1
             WHERE a.id = '$id' ");
        $update = $query->getResult();
        return $update;
    }
}