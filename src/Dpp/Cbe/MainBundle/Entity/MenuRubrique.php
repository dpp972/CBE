<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuRubrique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dpp\Cbe\MainBundle\Entity\MenuRubriqueRepository")
 */
class MenuRubrique
{
    /*------------------------*/
    /*--     PROPRIETES     --*/
    /*------------------------*/

    /**
     * @var integer
     *
     * @ORM\Column(name="menu_id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="menuRubriques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menuId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rubrique_id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Rubrique", inversedBy="menuRubriques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rubriqueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint")
     */
    private $position;


    /*------------------------*/
    /*--      METHODES      --*/
    /*------------------------*/

    /**
     * Set position
     *
     * @param integer $position
     * @return MenuRubrique
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set menuId
     *
     * @param integer $menuId
     * @return MenuRubrique
     */
    public function setMenuId($menuId)
    {
        $this->menuId = $menuId;

        return $this;
    }

    /**
     * Get menuId
     *
     * @return integer 
     */
    public function getMenuId()
    {
        return $this->menuId;
    }

    /**
     * Set rubriqueId
     *
     * @param integer $rubriqueId
     * @return MenuRubrique
     */
    public function setRubriqueId($rubriqueId)
    {
        $this->rubriqueId = $rubriqueId;

        return $this;
    }

    /**
     * Get rubriqueId
     *
     * @return integer 
     */
    public function getRubriqueId()
    {
        return $this->rubriqueId;
    }
}
