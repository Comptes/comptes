<?php

namespace Yomen\AccountsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yomen\AccountsBundle\Entity\Account;
use Yomen\AccountsBundle\Form\AccountType;
use Yomen\AccountsBundle\Controller\BaseEntityController;
/**
 * Account controller.
 *d
 */
class AccountController extends BaseEntityController
{

    protected $entity_name = "Account";
    protected $entity = 'YomenAccountsBundle:Account';
    protected $entity_class = "Yomen\AccountsBundle\Entity\Account"; 
    protected $form_class = "Yomen\AccountsBundle\Form\AccountType";    
}
