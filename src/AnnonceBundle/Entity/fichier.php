<?php

/**
 * Created by PhpStorm.
 * User: sedki
 * Date: 8/16/2018
 * Time: 12:22 AM
 */

namespace AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class fichier {


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

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
     * @ORM\ManyToOne(targetEntity="AnnonceBundle\Entity\Annonce", inversedBy="imageannonce")
     * @ORM\JoinColumn(name="annonce_ficher_id", referencedColumnName="id")
     */
    private $annonce;

    /**
     * @return mixed
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * @param mixed $user
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;
    }

    /**
     * @return mixed
     */
    public function getNonfich()
    {
        return $this->nonfich;
    }

    /**
     * @param mixed $nonfich
     */
    public function setNonfich($nonfich)
    {
        $this->nonfich = $nonfich;
    }


    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $nonfich;



}