<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM\ArticleData;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\Article as Article;

class ArticleLoad extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    public function load( ObjectManager $manager)
    {
        // Les articles
        $articleNames = array(
            1 => 'Qui sommes nous ?',
            2 => 'Notre musique',
            3 => 'Nos prestations',
            4 => 'Gustave Francisque',
            5 => 'L\'orchestre Sapotille Créole',
            6 => 'Espace presse');

        // On créer les Articles
        // et on les enregistre dans un tableau
        $articleTab = array();
        foreach ( $articleNames as $refNum => $name) {
            $articleTab[$refNum] = $this->createArticle( $name, $manager);
        }

        // On déclenche l'enregistrement
        $manager->flush();

        // On crée les références pour une utilisation ultérieure
        foreach ( $articleTab as $refNum => $articleObject) {
            $this->addReference('article_'.$refNum, $articleObject);
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

    private function createArticle( $articleName, ObjectManager $manager = null) {
        // On crée l'article
        $art = new Article();

        // On lui applique un nom
        $art->setTitre( $articleName);

        // On lui fourni un contenu
        $art->setContenu( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
        velit esse cillum dolore eu fugiat nulla pariatur.');

        $art->setSource( 'Association CBE');

        // Si le flag est levé, on le persiste
        if( $manager){
            $manager->persist( $art);
        }

        // La valeur de retour est l'objet créé
        return $art;
    }


}