<?php

namespace Comptes\CptBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ComptesController extends Controller
{
    public function indexAction()
    {
        $Param = array(
            'headContent' => '',
            'title' => 'titre',
            'titleContent' => 'Bienvenu ici les coupains',
            'middleContent' => 'Ah que coucou les lecteurs, j\'espère que ça va trop super bien ici !! =)',
        );
        return $this->render('ComptesCptBundle:Comptes:index.html.twig', $Param);
    }
}
