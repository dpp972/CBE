<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends EntityRepository
{
    /**
     * Recherche les données d'une page et celle du contenu associé
     * à partir de l'id de Page fourni en paramètre.
     *
     * Retourne un tableau associatif :
     * 'page' => données de la page
     * 'content'=> données du contenu associé
     *
     * @param $pageId (integer)
     * @return array
     */
    function findData( $pageId) {

        $em = $this->getEntityManager();

        $page = $em->createQuery(
                "SELECT p FROM ".$this->_entityName." p WHERE p.id = :pageId"
            )->setParameter( 'pageId', $pageId)
             ->setMaxResults( 1)->getOneOrNullResult();

        $content = null;
        $nodeId = $page->getNodeId();
        $nodeType = trim( $page->getNodeType());
        $nodeTypeExploded = explode( ' ', $nodeType, 1);
        $nodeType = $nodeType ? ucfirst( strtolower( array_shift( $nodeTypeExploded))) : $nodeType;

        if( $page && $nodeId && $nodeType){

            $content = $em->createQuery(
                "SELECT c FROM DppCbeMainBundle:".$nodeType." c WHERE c.id = :nodeId"
            )->setParameter( 'nodeId', $nodeId)
             ->setMaxResults( 1)->getOneOrNullResult();
        }

        return array( 'page' => $page, 'content' => $content);
    }

    /**
     * Recherche les données d'une page et celle du contenu associé
     * à partir des url de Page et de Rubrique fournis en paramètre.
     *
     * Retourne un tableau associatif :
     * 'page' => données de la page
     * 'content'=> données du contenu associé
     *
     * @param $rubriqueUrl (string)
     * @param $pageUrl (string)
     * @return array
     */
    function findDataByUrl( $pageUrl, $rubriqueUrl) {

        return $this->getEntityManager()
            ->createQuery(
                "SELECT p.id FROM ".$this->_entityName." p, DppCbeMainBundle:Rubrique r WHERE  p.rubriqueId=r.id and r.pathurl='".$rubriqueUrl."' and p.pathurl='".$pageUrl."'"
            )
            ->getResult();
    }
}