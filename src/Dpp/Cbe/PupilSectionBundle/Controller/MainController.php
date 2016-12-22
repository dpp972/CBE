<?php

namespace Dpp\Cbe\PupilSectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
    /**
     * @Route("/", name="eleve_home")
     * @Template()
     */
    public function pupilHomeAction()
    {
        return array();
    }
}
