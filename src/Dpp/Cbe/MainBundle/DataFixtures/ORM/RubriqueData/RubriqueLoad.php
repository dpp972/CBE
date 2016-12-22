<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM\RubriqueData;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\Rubrique as Rubrique;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RubriqueLoad extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    private $container;

    /**
     * @param ObjectManager $manager
     */
    public function load( ObjectManager $manager)
    {
        // Les rubriques
        $rubriqueNames = array(
            1 => 'Qui sommes nous ?',
            2 => 'Notre musique',
            3 => 'Nos prestations',
            4 => 'Gustave Francisque',
            5 => 'L\'orchestre Sapotille Créole',
            6 => 'Espace presse');

        // On créer les Rubriques
        // et on les enregistre dans un tableau
        $rubriqueTab = array();
        foreach ( $rubriqueNames as $refNum => $name) {
            $rubriqueTab[$refNum] = $this->createRubrique( $name, $manager);
        }

        // On déclenche l'enregistrement
        $manager->flush();

        // On crée les références pour une utilisation ultérieure
        foreach ( $rubriqueTab as $refNum => $rubriqueObject) {
            $this->addReference('rubrique_'.$refNum, $rubriqueObject);
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

    private function createRubrique( $rubriqueName, ObjectManager $manager = null) {
        // On crée la rubrique
        $rub = new Rubrique();

        // On lui applique un nom
        $rub->setLibelle( $rubriqueName);

        // On determine son url à partir de son nom
        // Dans lequel on remplace les caracteres interdits par des underscore
        $cmfMgr = $this->container->get( 'common_function_mgr');
        $pathurl = $cmfMgr->strToUrl( $rubriqueName);
//        $unWantedChars = array(
//            'Ă'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'AE', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'A',
//            'â'=>'a', 'ǎ'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'A', 'А'=>'A', 'å'=>'a', 'à'=>'a', 'Ǻ'=>'A', 'Ā'=>'A',
//            'é'=>'e', 'Е'=>'E', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'E', 'Ė'=>'E', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'E',
//            'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'Ĭ'=>'I', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'I', 'Ǐ'=>'I',
//            'о'=>'o', 'О'=>'O', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'O', 'ŏ'=>'o', 'Ŏ'=>'O', 'Ō'=>'O', 'ō'=>'o', 'ǒ'=>'o', 'ò'=>'o',
//            'ū'=>'u', 'Ũ'=>'U', 'ũ'=>'u', 'Ū'=>'U', 'Ǔ'=>'U', 'ų'=>'u', 'Ų'=>'U', 'ŭ'=>'u', 'Ŭ'=>'U', 'Ů'=>'U', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'U', 'Ǖ'=>'U', 'ǔ'=>'u', 'Ǜ'=>'U', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'u',
//            'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
//        );
//
//        $pattern = array( '/[^a-zA-Z0-9]+/', '/_$/', '/^_/');
//        $replacement = array( '_');
//        $subject = strtolower(  strtr( $rubriqueName, $unWantedChars));
//        $pathurl = preg_replace( $pattern, $replacement, $subject);

        $rub->setPathurl( $pathurl);

        $rub->setTheme( 'default');

        // Si le flag est levé, on le persiste
        if( $manager){
            $manager->persist( $rub);
        }

        // La valeur de retour est l'objet créé
        return $rub;
    }


    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        // TODO: Implement setContainer() method.
        $this->container = $container;
    }
}