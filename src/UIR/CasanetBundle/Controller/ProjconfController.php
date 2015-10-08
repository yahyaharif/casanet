<?php

namespace UIR\CasanetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use UIR\CasanetBundle\Entity\Projconf;
use UIR\CasanetBundle\Form\ProjconfType;

/**
 * Projconf controller.
 *
 */
class ProjconfController extends Controller
{

    /**
     * Lists all Projconf entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CasanetBundle:Projconf')->findAll();

        return $this->render('CasanetBundle:Projconf:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Projconf entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Projconf();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dashboard'));
        }

        return $this->render('CasanetBundle:Projconf:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Projconf entity.
     *
     * @param Projconf $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Projconf $entity)
    {
        $form = $this->createForm(new ProjconfType(), $entity, array(
            'action' => $this->generateUrl('projconf_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Projconf entity.
     *
     */
    public function newAction()
    {
        $entity = new Projconf();
        $form = $this->createCreateForm($entity);

        return $this->render('CasanetBundle:Projconf:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Projconf entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CasanetBundle:Projconf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projconf entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CasanetBundle:Projconf:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Projconf entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CasanetBundle:Projconf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projconf entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CasanetBundle:Projconf:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Projconf entity.
     *
     * @param Projconf $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Projconf $entity)
    {
        $form = $this->createForm(new ProjconfType(), $entity, array(
            'action' => $this->generateUrl('projconf_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Projconf entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CasanetBundle:Projconf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projconf entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dashboard'));
        }

        return $this->render('CasanetBundle:Projconf:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Projconf entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('CasanetBundle:Projconf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projconf entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('dashboard'));
    }

    /**
     * Creates a form to delete a Projconf entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projconf_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
