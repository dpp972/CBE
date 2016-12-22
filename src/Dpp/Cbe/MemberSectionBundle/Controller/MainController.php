<?php

namespace Dpp\Cbe\MemberSectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
    /**
     * @Route("/", name="membre_home")
     * @Template()
     */
    public function memberHomeAction()
    {
        return array();
    }
}
