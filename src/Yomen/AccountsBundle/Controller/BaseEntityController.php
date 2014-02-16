<?php

namespace Yomen\AccountsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yomen\AccountsBundle\Entity\BaseEntity;

/**
 * Operation controller.
 *
 */
class BaseEntityController extends Controller
{

    protected $entity_name = "BaseEntity";
    protected $entity = 'YomenAccountsBundle:BaseEntity';
    protected $entity_class = "BaseEntity"; 
    protected $form_class = null;
    /**
     * Lists all Operation entities.
     *
     */

    // return the current user
    public function get_current_user() {
        return $this->get('security.context')->getToken()->getUser();
    }
    // return true if the current user is fully authenticated (not anonymous)
    public function is_fully_authenticated() {
        return $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY');
    }

    // throw a 404 error if the user is not logged in
    public function login_required(){
        if (!$this->is_fully_authenticated()) {
            throw $this->createNotFoundException('You need to login first');
        }
    }
    public function indexAction()
    {
        $this->login_required();
        $em = $this->getDoctrine()->getManager();

        // list of entities owned by current user
        $entities = $em->getRepository($this->entity)
            ->findBy(array("owner" => $this->get_current_user()));

        return $this->render($this->entity.':index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new entity.
     *
     */
    public function createAction(Request $request)
    {
        $this->login_required();

        $entity = new $this->entity_class();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setOwner($this->get_current_user()); // owner is current user
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl(strtolower($this->entity_name).'_show', array('id' => $entity->getId())));
        }

        return $this->render($this->entity.':new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Operation entity.
    *
    * @param Operation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BaseEntity $entity)
    {
        $form = $this->createForm(new $this->form_class(), $entity, array(
            'action' => $this->generateUrl(strtolower($this->entity_name).'_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Operation entity.
     *
     */
    public function newAction()
    {
        $this->login_required();
        $entity = new $this->entity_class();
        $form   = $this->createCreateForm($entity);

        return $this->render($this->entity.':new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Operation entity.
     *
     */
    public function showAction($id)
    {
        $this->login_required();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($this->entity)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render($this->entity.':show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Operation entity.
     *
     */
    public function editAction($id)
    {
        $this->login_required();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($this->entity)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render($this->entity.':edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Operation entity.
    *
    * @param Operation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BaseEntity $entity)
    {
        $form = $this->createForm(new $this->form_class(), $entity, array(
            'action' => $this->generateUrl(strtolower($this->entity_name).'_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Operation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $this->login_required();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($this->entity)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl(strtolower($this->entity_name).'_edit', array('id' => $id)));
        }

        return $this->render($this->entity.':edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Operation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $this->login_required();
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository($this->entity)->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl(strtolower($this->entity_name)));
    }

    /**
     * Creates a form to delete a Operation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl(strtolower($this->entity_name).'_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
