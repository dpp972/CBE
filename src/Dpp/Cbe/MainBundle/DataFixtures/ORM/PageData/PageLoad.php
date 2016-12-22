<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM\MenuData;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\Page as Page;

class PageLoad extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    public function load( ObjectManager $manager)
    {
        // Les pages
        // array( libelle, rubrique_ref, article_ref, templateType_ref, pathurl)
        $pageData = array(
            1 => array( 'Qui somme-nous ?', 'rubrique_1', 'article_1', 'templateType_1'),
            2 => array( 'Notre musique', 'rubrique_2', 'article_2', 'templateType_1'),
            3 => array( 'Nos prestation', 'rubrique_3', 'article_3', 'templateType_1'),
            4 => array( 'Gustave Francisque', 'rubrique_4', 'article_4', 'templateType_1'),
            5 => array( 'L\'orchestre Sapotille Créole', 'rubrique_5', 'article_5', 'templateType_1'),
            6 => array( 'Espace presse', 'rubrique_6', 'article_6', 'templateType_1'),);

        // On créer les MenuRubrique
        // et on les enregistre dans un tableau
        $pageTab = array();
        foreach ( $pageData as $refNum => $data) {
            $pageTab[$refNum] = $this->createPage( $data[0], $data[1], $data[2], $data[3], $manager);
        }

        // On déclenche l'enregistrement
        $manager->flush();

//        // On crée les références pour une utilisation ultérieure
        foreach ( $pageTab as $refNum => $pageObject) {
            $this->addReference('page_'.$refNum, $pageObject);
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
        return 3;
    }

    //------------------------------------------------------------------------------------------------------

    private function createPage( $libelle, $rubriqueRef, $articleRef, $templateTypeRef, ObjectManager $manager = null) {
        // On crée la rubrique
        $page = new Page();

        $page->setLibelle( $libelle);
        $page->setActive( true);
        $page->setVisible( true);
        $page->setNodeType( 'Article');
        $page->setNodeId( $this->getReference( $articleRef)->getId());
        $page->setRubrique( $this->getReference( $rubriqueRef));

        // Si le flag est levé, on le persiste
        if( $manager){
            $manager->persist( $page);
        }

        // La valeur de retour est l'objet créé
        return $page;
    }


}