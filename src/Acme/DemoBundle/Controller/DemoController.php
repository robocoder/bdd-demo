<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/box", name="box")
     * 
     */
    public function boxAction()
    {
        return $this->render('AcmeDemoBundle:Demo:demo.html.twig', array(
            'options' => array('Choose a color', 'Red', 'Green', 'Yellow')
        ));
    }
    
}
