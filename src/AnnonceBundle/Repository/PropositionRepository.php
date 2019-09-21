<?php

namespace AnnonceBundle\Repository;

/**
 * PropositionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PropositionRepository extends \Doctrine\ORM\EntityRepository
{
    function MinProposition($id){
        $query=$this->getEntityManager()
            ->createQuery("     
                                SELECT p
								FROM AnnonceBundle:Proposition p
								WHERE
								      p.propositionPrix = (
								        SELECT MIN(k.propositionPrix)
								        FROM AnnonceBundle:Proposition k
								        WHERE k.annonce ='$id' 
								      )
						  ");

        return $query->getOneOrNullResult();
    }

    function AncienneProposition($userConnected,$id){
        $query=$this->getEntityManager()
            ->createQuery("     
                                SELECT p
								FROM AnnonceBundle:Proposition p
								WHERE p.user='$userConnected' AND p.annonce='$id' 
						  ");

        return $query->getOneOrNullResult();
    }
}