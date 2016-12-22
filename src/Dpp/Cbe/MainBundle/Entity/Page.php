<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dpp\Cbe\MainBundle\Entity\PageRepository")
 */
class Page
{
    /*------------------------*/
    /*--     PROPERTIES     --*/
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pathurl", type="string", length=255, options={"default":"/"})
     */
    private $pathurl='/';

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", options={"default":false})
     */
    private $active=false;

    /**
     * @var string
     *
     * @ORM\Column(name="nodeType", type="string", length=255, nullable=true)
     */
    private $nodeType;

    /**
     * @var integer
     *
     * @ORM\Column(name="nodeId", type="integer", nullable=true)
     */
    private $nodeId;


    /*---------------------------*/
    /*--     RELATIONSHIPS     --*/
    /*---------------------------*/

    /**
     * @var \Dpp\Cbe\MainBundle\Entity\Rubrique
     *
     * @ORM\ManyToOne(targetEntity="Rubrique")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rubrique;


    /*------------------------*/
    /*--      METHODES      --*/
    /*------------------------*/

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
     * Set pathurl
     *
     * @param string $pathurl
     * @return Page
     */
    public function setPathurl($pathurl)
    {
        $this->pathurl = $pathurl;

        return $this;
    }

    /**
     * Get pathurl
     *
     * @return string 
     */
    public function getPathurl()
    {
        return $this->pathurl;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Page
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set rubrique
     *
     * @param \Dpp\Cbe\MainBundle\Entity\Rubrique $rubrique
     * @return Page
     */
    public function setRubrique(\Dpp\Cbe\MainBundle\Entity\Rubrique $rubrique = null)
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * Get rubrique
     *
     * @return \Dpp\Cbe\MainBundle\Entity\Rubrique 
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }

    

    /**
     * Set active
     *
     * @param boolean $active
     * @return Page
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set nodeType
     *
     * @param string $nodeType
     * @return Page
     */
    public function setNodeType($nodeType)
    {
        $this->nodeType = $nodeType;

        return $this;
    }

    /**
     * Get nodeType
     *
     * @return string 
     */
    public function getNodeType()
    {
        return $this->nodeType;
    }

    /**
     * Set nodeId
     *
     * @param integer $nodeId
     * @return Page
     */
    public function setNodeId($nodeId)
    {
        $this->nodeId = $nodeId;

        return $this;
    }

    /**
     * Get nodeId
     *
     * @return integer 
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Page
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }
}
