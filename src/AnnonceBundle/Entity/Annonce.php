<?php

/**
 * Created by PhpStorm.
 * User: sedki
 * Date: 8/16/2018
 * Time: 12:22 AM
 */

namespace AnnonceBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AnnonceBundle\Repository\AnnonceRepository")
 */
class Annonce {


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="annonce")
     * @ORM\JoinColumn(name="user_annonce_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $service;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $typedoc;

    /**
     * @ORM\Column(type="integer",length=255, nullable=true)
     */
    protected $largeur;

    /**
     * @ORM\Column(type="integer",length=255, nullable=true)
     */
    protected $longeur;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $recto_verso;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $description_annonce;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $titre;

    /**
     * @ORM\Column(type="integer",length=255, nullable=true)
     */
    protected $budget;

    /**
     *  @ORM\Column(type="date", nullable=true)
     */
    protected $duree;



    /**
     * @ORM\Column(type="integer",length=255, nullable=true)
     */
    protected $delaiEnHeures;



    /**
    * @ORM\Column(type="string",length=255, nullable=true)
    */
    protected $lienFB;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $lienIN;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $lienTW;



    /**
     * @ORM\Column(type="integer")
     */
    protected $nbVues=0 ;


    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $styleGraphique;

    /**
     * @return mixed
     */
    public function getImageannonce()
    {
        return $this->imageannonce;
    }

    /**
     * @param mixed $imageannonce
     */
    public function setImageannonce($imageannonce)
    {
        $this->imageannonce = $imageannonce;
    }
    /**
     * @ORM\OneToMany(targetEntity="AnnonceBundle\Entity\fichier", mappedBy="annonce")
     */
    private $imageannonce;




    /**
     * @ORM\OneToMany(targetEntity="AnnonceBundle\Entity\Proposition", mappedBy="annonce")
     */
    protected $propositions;

    public function __construct() {
        $this->propositions = new ArrayCollection();
        $this->imageannonce = new ArrayCollection();
    }

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
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getTypedoc()
    {
        return $this->typedoc;
    }

    /**
     * @param mixed $typedoc
     */
    public function setTypedoc($typedoc)
    {
        $this->typedoc = $typedoc;
    }

    /**
     * @return mixed
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * @param mixed $largeur
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;
    }

    /**
     * @return mixed
     */
    public function getLongeur()
    {
        return $this->longeur;
    }

    /**
     * @param mixed $longeur
     */
    public function setLongeur($longeur)
    {
        $this->longeur = $longeur;
    }

    /**
     * @return mixed
     */
    public function getRectoVerso()
    {
        return $this->recto_verso;
    }

    /**
     * @param mixed $recto_verso
     */
    public function setRectoVerso($recto_verso)
    {
        $this->recto_verso = $recto_verso;
    }

    /**
     * @return mixed
     */
    public function getDescriptionAnnonce()
    {
        return $this->description_annonce;
    }

    /**
     * @param mixed $description_annonce
     */
    public function setDescriptionAnnonce($description_annonce)
    {
        $this->description_annonce = $description_annonce;
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
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getDelaiEnHeures()
    {
        return $this->delaiEnHeures;
    }

    /**
     * @param mixed $delaiEnHeures
     */
    public function setDelaiEnHeures($delaiEnHeures)
    {
        $this->delaiEnHeures = $delaiEnHeures;
    }

    /**
     * @return mixed
     */
    public function getLienFB()
    {
        return $this->lienFB;
    }

    /**
     * @param mixed $lienFB
     */
    public function setLienFB($lienFB)
    {
        $this->lienFB = $lienFB;
    }

    /**
     * @return mixed
     */
    public function getLienIN()
    {
        return $this->lienIN;
    }

    /**
     * @param mixed $lienIN
     */
    public function setLienIN($lienIN)
    {
        $this->lienIN = $lienIN;
    }

    /**
     * @return mixed
     */
    public function getLienTW()
    {
        return $this->lienTW;
    }

    /**
     * @param mixed $lienTW
     */
    public function setLienTW($lienTW)
    {
        $this->lienTW = $lienTW;
    }

    /**
     * @return mixed
     */
    public function getNbVues()
    {
        return $this->nbVues;
    }

    /**
     * @param mixed $nbVues
     */
    public function setNbVues($nbVues)
    {
        $this->nbVues = $nbVues;
    }

    /**
     * @return mixed
     */
    public function getStyleGraphique()
    {
        return $this->styleGraphique;
    }

    /**
     * @param mixed $styleGraphique
     */
    public function setStyleGraphique($styleGraphique)
    {
        $this->styleGraphique = $styleGraphique;
    }

    /**
     * @return mixed
     */
    public function getPropositions()
    {
        return $this->propositions;
    }

    /**
     * @param mixed $propositions
     */
    public function setPropositions($propositions)
    {
        $this->propositions = $propositions;
    }





}