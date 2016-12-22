<?php

namespace Dpp\Cbe\AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class MainController extends Controller
{
    /**
     * @Route("/", name="administration_home")
     * @Template()
     */
    public function adminHomeAction()
    {
//        $securityContext = $this->get( 'security.context');
//
//        if( $securityContext->isGranted( 'ROLE_EDITEUR') || $securityContext->isGranted( 'ROLE_ADMIN')){
//            return $this->render( 'DppCbeMainBundle::admin_editeur_ihm.html.twig', array());
//        }
//        else {}
//
//        return $this->render( 'DppCbeMainBundle:Default:after_login.html.twig', array());
//        return $this->render( 'DppCbeAdministrationBundle::base_sb_admin.html.twig', array());
        return array();
    }
}
