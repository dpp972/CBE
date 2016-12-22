<?php

namespace Dpp\Cbe\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MenuController extends Controller
{

    /**
     * @return array
     */
    public function mainMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modelMgr = $this->get( 'model_mgr');

        $sectionList = $em->getRepository( 'DppCbeMainBundle:Menu')->findRubFrom( 'Main_Menu');
        $sectionList = $modelMgr->sortMenu( $sectionList, 'position');

        return $this->render( 'DppCbeMainBundle:_Components:main_menu.html.twig', array( 'menu' => $sectionList));
    }

}
