<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM\MenuData;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\Rubrique as Rubrique;

class RubriqueLandingPageLoad extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    public function load( ObjectManager $manager)
    {
        // Les rubriques à mettre a jour par référence
        $majData = array(
            array( 'rubrique_1', 'page_1'),
            array( 'rubrique_2', 'page_2'),
            array( 'rubrique_3', 'page_3'),
            array( 'rubrique_4', 'page_4'),
            array( 'rubrique_5', 'page_5'),
            array( 'rubrique_6', 'page_6'),);

        // On met à jour les rubriques
        foreach ( $majData as $data) {
            // On charge la rubrique
            $rub = $this->getReference( $data[0]);

            // On met à jour la landing page
            $rub->setLandingPage( $this->getReference( $data[1]));

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
        return 4;
    }

}