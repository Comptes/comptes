<?php

namespace Yomen\AccountsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yomen\AccountsBundle\Entity\Operation;
use Yomen\AccountsBundle\Form\OperationType;
use Yomen\AccountsBundle\Controller\BaseEntityController;

/**
 * Operation controller.
 *
 */
class OperationController extends BaseEntityController
{
    protected $entity_name = "Operation";
    protected $entity = 'YomenAccountsBundle:Operation';
    protected $entity_class = "Yomen\AccountsBundle\Entity\Operation"; 
    protected $form_class = "Yomen\AccountsBundle\Form\OperationType";    
}
