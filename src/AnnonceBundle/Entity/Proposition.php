<?php

namespace AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;


/**
 * Proposition
 *
 * @ORM\Table(name="proposition")
 * @ORM\Entity(repositoryClass="AnnonceBundle\Repository\PropositionRepository")
 */
class Proposition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $dateTime;



    /**
     * @ORM\Column(type="float",length=255, nullable=true)
     */
    protected $propositionPrix;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @ManyToOne(targetEntity="AnnonceBundle\Entity\Annonce", inversedBy="propositions")
     * @JoinColumn(name="annonce_id", referencedColumnName="id")
     */
    private $annonce;
    /**
     * @return mixed
     */
    public function getPropositionPrix()
    {
        return $this->propositionPrix;
    }

    /**
     * @param mixed $propositionPrix
     */
    public function setPropositionPrix($propositionPrix)
    {
        $this->propositionPrix = $propositionPrix;
    }

    /**
     * @return mixed
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * @param mixed $annonce
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;
    }

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",inversedBy="propositions")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }




}
