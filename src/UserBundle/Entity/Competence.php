<?php
/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/1/2018
 * Time: 11:54 AM
 */

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Competence {
    /**
     * @return mixed
     */
    public function getNomcompetence()
    {
        return $this->nomcompetence;
    }

    /**
     * @param mixed $nomcompetence
     */
    public function setNomcompetence($nomcompetence)
    {
        $this->nomcompetence = $nomcompetence;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $nomcompetence;





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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="competences")
     * @ORM\JoinColumn(name="user_competence_id", referencedColumnName="id")
     */
    private $user;

}