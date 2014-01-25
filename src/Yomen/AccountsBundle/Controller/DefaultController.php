<?php

namespace Yomen\AccountsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('YomenAccountsBundle:Default:index.html.twig', array('name' => $name));
    }
}
