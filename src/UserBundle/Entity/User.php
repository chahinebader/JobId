<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $nom;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $prenom;

    /**
     * @return mixed
     */



    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="boolean", name="isfreelancer")
     */

    protected $freelancer ;

    /**
     * @return mixed
     */
    public function getFreelancer()
    {
        return $this->freelancer;
    }

    /**
     * @param mixed $freelancer
     */
    public function setFreelancer($freelancer)
    {
        $this->freelancer = $freelancer;
    }

    /**
     * @ORM\Column(type="boolean", name="isclient")
     */

    protected $client ;

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $brochure;

    /**
     * @return mixed
     */
    public function getBrochure()
    {
        return $this->brochure;
    }

    /**
     * @param mixed $brochure
     */
    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;
    }

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $pays;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $siret;
    /**
     * @ORM\Column(type="boolean", nullable=true,name="isentreprise")
     */
    protected $entreprise;
    /**
     * @ORM\Column(type="boolean", nullable=true,name="isindividuelle")
     */
    protected $individuelle;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $ville;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $etat;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $telephone;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $codepostal;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    protected $fuseauhorraire;

    /**
     * @return mixed
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * @param mixed $codepostal
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param mixed $siret
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @return mixed
     */
    public function getIndividuelle()
    {
        return $this->individuelle;
    }

    /**
     * @param mixed $individuelle
     */
    public function setIndividuelle($individuelle)
    {
        $this->individuelle = $individuelle;
    }





    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getFuseauhorraire()
    {
        return $this->fuseauhorraire;
    }

    /**
     * @param mixed $fuseauhorraire
     */
    public function setFuseauhorraire($fuseauhorraire)
    {
        $this->fuseauhorraire = $fuseauhorraire;
    }

    /**
     * @return mixed
     */
    public function getLangues()
    {
        return $this->langues;
    }

    /**
     * @param mixed $langues
     */
    public function setLangues($langues)
    {
        $this->langues = $langues;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    /**
     *
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Langue", mappedBy="user")
     */
    protected $langues;


    public function setEmail($email)
    {
        $email = is_null($email) ? '' : $email;
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="ExperienceBundle\Entity\Experience", mappedBy="user")
     */
    private $experience;

    /**
     * @ORM\OneToMany(targetEntity="FormationBundle\Entity\Format", mappedBy="user")
     */
    private $format;

    /**
     * @return mixed
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * @param mixed $competences
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;
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
    * @ORM\OneToMany(targetEntity="UserBundle\Entity\Competence", mappedBy="user")
    */
    private $competences;

    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Portfolio", mappedBy="user")
     */
    private $portfolio;

    /**
     * @ORM\OneToMany(targetEntity="AnnonceBundle\Entity\Annonce", mappedBy="user")
     */
    private $annonce;

    /**
     * @ORM\OneToMany(targetEntity="AnnonceBundle\Entity\Proposition", mappedBy="user")
     */
    private $propositions;

    public function __construct()
{
    parent::__construct();
    $this->experience = new ArrayCollection();
    $this->format = new ArrayCollection();
    $this->langues = new ArrayCollection();
    $this->competences = new ArrayCollection();
    $this->portfolio = new ArrayCollection();
    $this->annonce = new ArrayCollection();
    $this->propositions = new ArrayCollection();
}


    /**
     * One User has One Description.
     * @ORM\OneToOne(targetEntity="DescriptionBundle\Entity\Description")
     * @ORM\JoinColumn(name="description_id", referencedColumnName="id")
     */
    private $description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * One User has One Niveau.
     * @ORM\OneToOne(targetEntity="NiveauBundle\Entity\Niveau")
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     */
    private $niveau;

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }






}
