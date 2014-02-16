<?php

namespace Yomen\CategoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yomen\CategoryBundle\Entity\Category;
use Yomen\CategoryBundle\Form\CategoryType;
use Yomen\AccountsBundle\Controller\BaseEntityController;

/**
 * Category controller.
 *
 */
class CategoryController extends BaseEntityController
{
    protected $entity_name = "Category";
    protected $entity = 'YomenCategoryBundle:Category';
    protected $entity_class = "Yomen\CategoryBundle\Entity\Category"; 
    protected $form_class = "Yomen\CategoryBundle\Form\CategoryType";    
   
}
