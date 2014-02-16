<?php

namespace Comptes\CptBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ComptesCptBundle:Default:index.html.twig', array('name' => $name));
    }
}
