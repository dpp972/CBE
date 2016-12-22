<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rubrique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dpp\Cbe\MainBundle\Entity\RubriqueRepository")
 */
class Rubrique
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pathurl", type="string", length=255)
     */
    private $pathurl;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=255)
     */
    private $theme;


    /*---------------------------*/
    /*--     RELATIONSHIPS     --*/
    /*---------------------------*/

    /**
     * @ORM\OneToMany(targetEntity="MenuRubrique", mappedBy="rubriqueId")
     */
    private $menuRubriques;

    /**
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumn(nullable=true)
     */
    private $landingPage;
    

    /*------------------------*/
    /*--      METHODES      --*/
    /*------------------------*/

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menuRubriques = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Rubrique
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
     * Add menuRubriques
     *
     * @param \Dpp\Cbe\MainBundle\Entity\MenuRubrique $menuRubriques
     * @return Rubrique
     */
    public function addMenuRubrique(\Dpp\Cbe\MainBundle\Entity\MenuRubrique $menuRubriques)
    {
        $this->menuRubriques[] = $menuRubriques;

        return $this;
    }

    /**
     * Remove menuRubriques
     *
     * @param \Dpp\Cbe\MainBundle\Entity\MenuRubrique $menuRubriques
     */
    public function removeMenuRubrique(\Dpp\Cbe\MainBundle\Entity\MenuRubrique $menuRubriques)
    {
        $this->menuRubriques->removeElement($menuRubriques);
    }

    /**
     * Get menuRubriques
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMenuRubriques()
    {
        return $this->menuRubriques;
    }

    /**
     * Set landingPage
     *
     * @param \Dpp\Cbe\MainBundle\Entity\Page $landingPage
     * @return Rubrique
     */
    public function setLandingPage(\Dpp\Cbe\MainBundle\Entity\Page $landingPage = null)
    {
        $this->landingPage = $landingPage;

        return $this;
    }

    /**
     * Get landingPage
     *
     * @return \Dpp\Cbe\MainBundle\Entity\Page 
     */
    public function getLandingPage()
    {
        return $this->landingPage;
    }

    /**
     * Set pathurl
     *
     * @param string $pathurl
     * @return Rubrique
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
     * Set theme
     *
     * @param string $theme
     * @return Rubrique
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
