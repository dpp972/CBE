<?php

namespace Dpp\Cbe\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageAccessController extends Controller
{
    /**
     * @Route("/", name="main_home")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository( 'DppCbeMainBundle:News')->findAvailableNews();
        return array( 'news' => $news);
    }

    //-----------------------------------------------------------------------------------------------------------
    /**
     * @Route("/portail", name="main_portal_selection")
     * @Template()
     */
    public function portalSelectionAction()
    {
        return array();
    }

    //-----------------------------------------------------------------------------------------------------------

    /**
     * @Route("/{pathurl}", name="main_common_page", requirements={ "pathurl" = "^([a-z0-9_]+/?)+$"})
     * @Template()
     */
    public function rubriqueAction( $pathurl)
    {
        //La partie de pathurl avant le premier '/' correspond à la rubrique...
        $rubriqueUrl = ( $str = strstr( $pathurl, '/', true)) ? $str : $pathurl;

        //Le reste correspond au chemin de la page dans cette rubrique
        $pagePath = ($str = substr( $pathurl, strlen( $rubriqueUrl))) ? $str : '/';

        //Déclaration du gestionnaire d'entités
        $em = $this->getDoctrine()->getManager();

        //On vérifie tout d'abord l'existence de la rubrique
        $rubrique = $em->getRepository( 'DppCbeMainBundle:Rubrique')->findOneByPathurl( $rubriqueUrl);
        if( empty( $rubrique)) throw $this->createNotFoundException( 'Cette page n\'existe pas Papo ! :3');

        //Initialisation de la page resultante
        $pageData = [];

        //Si il n'y a rien après le nom de la rubrique
        if( $pagePath == '/'){

            //C'est que lon veut la page d'arrivé de cette rubrique
            $landingPage = $rubrique->getLandingPage();

            if( $landingPage === null || !$landingPage->getActive()) throw $this->createNotFoundException( 'Bullshit ! Page NOT FOUND !!');

            $pageData = $em->getRepository( 'DppCbeMainBundle:Page')->findData( $landingPage->getId());
//            var_dump( $resultPage);
//            exit;
        }
        //Sinon
        else {

            //C'est que l'on recherche la page correspondante au chemin spécifié
            $resultId = $em->getRepository( 'DppCbeMainBundle:Page')->findIdByUrl( $rubriqueUrl, $pagePath);
            if( empty( $resultId)) throw $this->createNotFoundException( 'Cette page n\'existe pas Papo ! :3');

            $pageData = $em->getRepository( 'DppCbeMainBundle:Page')->findDataByUrl( $resultId[0]['id']);
        }

        //TODO : Traitement Blog

        $template = 'DppCbeMainBundle:_Templates:template_'.$rubrique->getTheme().'.html.twig'; //TODO valider l'existence du fichier avant de l'utiliser...

        return $this->render( 'DppCbeMainBundle:PageAccess:page.html.twig', array( 'pageData' => $pageData, 'templateName' => $template));
    }

}
