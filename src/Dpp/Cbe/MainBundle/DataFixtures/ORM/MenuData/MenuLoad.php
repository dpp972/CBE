<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM\MenuData;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\Menu as Menu;

class MenuLoad extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    public function load( ObjectManager $manager)
    {
        // Les menu
        $menuNames = array(
            1 => 'Main_Menu',);

        // On créer les Rubriques
        // et on les enregistre dans un tableau
        $menuTab = array();
        foreach ( $menuNames as $refNum => $name) {
            $menuTab[$refNum] = $this->createMenu( $name, $manager);
        }

        // On déclenche l'enregistrement
        $manager->flush();

        // On crée les références pour une utilisation ultérieure
        foreach ( $menuTab as $refNum => $menuObject) {
            $this->addReference('menu_'.$refNum, $menuObject);
        }
    }

    //------------------------------------------------------------------------------------------------------

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

    //------------------------------------------------------------------------------------------------------

    private function createMenu( $menuName, ObjectManager $manager = null) {
        // On crée la rubrique
        $menu = new Menu();

        // On lui applique un nom
        $menu->setLibelle( $menuName);

        // Si le flag est levé, on le persiste
        if( $manager){
            $manager->persist( $menu);
        }

        // La valeur de retour est l'objet créé
        return $menu;
    }


}