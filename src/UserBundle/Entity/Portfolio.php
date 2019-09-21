<?php
/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/8/2018
 * Time: 12:02 PM
 */

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 */
class Portfolio

{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $nomlogo;

    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    protected $datecreation ;

    /**
     * @ORM\Column(type="boolean" , nullable=true)
     */
    protected $isvisible ;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Image()
     */
    private $imagelogo;

    /**
     * @return mixed
     */
    public function getImagelogo()
    {
        return $this->imagelogo;
    }

    /**
     * @param mixed $imagelogo
     */
    public function setImagelogo($imagelogo)
    {
        $this->imagelogo = $imagelogo;
    }



    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="portfolio")
     * @ORM\JoinColumn(name="user_portfolio_id", referencedColumnName="id")
     */
    private $user;

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
    public function getNomlogo()
    {
        return $this->nomlogo;
    }

    /**
     * @param mixed $nomlogo
     */
    public function setNomlogo($nomlogo)
    {
        $this->nomlogo = $nomlogo;
    }

    /**
     * @return mixed
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * @param mixed $datecreation
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;
    }

    /**
     * @return mixed
     */
    public function getIsvisible()
    {
        return $this->isvisible;
    }

    /**
     * @param mixed $isvisible
     */
    public function setIsvisible($isvisible)
    {
        $this->isvisible = $isvisible;
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

}