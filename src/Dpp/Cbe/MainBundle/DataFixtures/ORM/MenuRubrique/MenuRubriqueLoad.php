<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM\MenuData;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\MenuRubrique as MenuRubrique;

class MenuRubriqueLoad extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    public function load( ObjectManager $manager)
    {
        // Les associations menu <-> rubrique par réfrences
        $menuRubriqueData = array(
            array( 'menu_1', 'rubrique_1', 1),
            array( 'menu_1', 'rubrique_2', 2),
            array( 'menu_1', 'rubrique_3', 3),
            array( 'menu_1', 'rubrique_4', 4),
            array( 'menu_1', 'rubrique_5', 5),
            array( 'menu_1', 'rubrique_6', 6),);

        // On créer les MenuRubrique
        // et on les enregistre dans un tableau
        foreach ( $menuRubriqueData as $data) {
            $this->createMenuRubrique( $data[0], $data[1], $data[2], $manager);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

    //------------------------------------------------------------------------------------------------------

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

    //------------------------------------------------------------------------------------------------------

    private function createMenuRubrique( $menuRef, $rubriqueRef, $position, ObjectManager $manager = null) {
        // On crée la rubrique
        $menuRub = new MenuRubrique();

        $menuRub->setMenuId( $this->getReference( $menuRef)->getId());
        $menuRub->setRubriqueId( $this->getReference( $rubriqueRef)->getId());
        $menuRub->setPosition( $position);

        // Si le flag est levé, on le persiste
        if( $manager){
            $manager->persist( $menuRub);
        }

        // La valeur de retour est l'objet créé
        return $menuRub;
    }


}