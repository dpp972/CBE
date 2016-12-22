<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dpp\Cbe\MainBundle\Entity\MenuRepository")
 */
class Menu
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
     * @var integer
     *
     * @ORM\Column(name="depth", type="integer", options={"default":1})
     */
    private $depth=1;


    /*---------------------------*/
    /*--     RELATIONSHIPS     --*/
    /*---------------------------*/

    /**
     * @ORM\OneToMany(targetEntity="MenuRubrique", mappedBy="menuId")
     */
    private $menuRubriques;


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
     * @return Menu
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
     * @return Menu
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
     * Set depth
     *
     * @param integer $depth
     * @return Menu
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return integer 
     */
    public function getDepth()
    {
        return $this->depth;
    }
}
