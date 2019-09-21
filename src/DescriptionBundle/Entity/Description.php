<?php

namespace DescriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Description
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="details_description", type="string", length=255, nullable=true)
     */
    private $details_description;

    /**
     * @return mixed
     */
    public function getDetailsDescription()
    {
        return $this->details_description;
    }

    /**
     * @param mixed $details_description
     */
    public function setDetailsDescription($details_description)
    {
        $this->details_description = $details_description;
    }


    public function __toString() {
        return $this->details_description;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




}
