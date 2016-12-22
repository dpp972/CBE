<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Article
{
    /*------------------------*/
    /*--     PROPRIETES     --*/
    /*------------------------*/

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="sousTitre", type="string", length=255, options={"default":""})
     */
    private $sousTitre="";

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=510, nullable=true)
     */
    private $source;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", options={"default":false})
     */
    private $visible=false;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDebPub", type="datetime", nullable=true)
     */
    private $dateDebPub;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFinPub", type="datetime", nullable=true)
     */
    private $dateFinPub;

    /**
     * @var string
     *
     * @ORM\Column(name="statusAdmin", type="string", length=255, nullable=true, options={"default":""})
     */
    private $statusAdmin="";


    /*---------------------------*/
    /*--     RELATIONSHIPS     --*/
    /*---------------------------*/


    /*------------------------*/
    /*--      METHODES      --*/
    /*------------------------*/

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }


    public function __toString(){
        return $this->titre;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Article
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Set sousTitre
     *
     * @param string $sousTitre
     * @return Article
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    /**
     * Get sousTitre
     *
     * @return string 
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Article
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Article
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set dateDebPub
     *
     * @param \DateTime $dateDebPub
     * @return Article
     */
    public function setDateDebPub($dateDebPub)
    {
        $this->dateDebPub = $dateDebPub;

        return $this;
    }

    /**
     * Get dateDebPub
     *
     * @return \DateTime 
     */
    public function getDateDebPub()
    {
        return $this->dateDebPub;
    }

    /**
     * Set dateFinPub
     *
     * @param \DateTime $dateFinPub
     * @return Article
     */
    public function setDateFinPub($dateFinPub)
    {
        $this->dateFinPub = $dateFinPub;

        return $this;
    }

    /**
     * Get dateFinPub
     *
     * @return \DateTime 
     */
    public function getDateFinPub()
    {
        return $this->dateFinPub;
    }

    /**
     * Set statusAdmin
     *
     * @param string $statusAdmin
     * @return Article
     */
    public function setStatusAdmin($statusAdmin)
    {
        $this->statusAdmin = $statusAdmin;

        return $this;
    }

    /**
     * Get statusAdmin
     *
     * @return string 
     */
    public function getStatusAdmin()
    {
        return $this->statusAdmin;
    }
}
