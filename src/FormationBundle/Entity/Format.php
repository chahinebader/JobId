<?php
/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/2/2018
 * Time: 3:07 PM

/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/1/2018
 * Time: 11:54 AM
 */

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Format {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $titre;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $details;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $groupe;


    /**
     *  @ORM\Column(type="date", nullable=true)
     */
    protected $datedebut;

    /**
     *  @ORM\Column(type="date", nullable=true)
     */
    protected $datefin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param mixed $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="format")
     * @ORM\JoinColumn(name="user_formation_id", referencedColumnName="id")
     */
    private $user;

}