<?php

namespace Gigclub\MembershipBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Gigclub\MembershipBundle\Entity\MembershipType;
use Gigclub\MembershipBundle\Form\MembershipTypeType;

/**
 * MembershipType controller.
 *
 * @Route("/membershiptype")
 */
class MembershipTypeController extends Controller
{

    /**
     * Lists all MembershipType entities.
     *
     * @Route("/", name="membershiptype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GigclubMembershipBundle:MembershipType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MembershipType entity.
     *
     * @Route("/", name="membershiptype_create")
     * @Method("POST")
     * @Template("GigclubMembershipBundle:MembershipType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new MembershipType();
        $form = $this->createForm(new MembershipTypeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('membershiptype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new MembershipType entity.
     *
     * @Route("/new", name="membershiptype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MembershipType();
        $form   = $this->createForm(new MembershipTypeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MembershipType entity.
     *
     * @Route("/{id}", name="membershiptype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GigclubMembershipBundle:MembershipType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MembershipType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MembershipType entity.
     *
     * @Route("/{id}/edit", name="membershiptype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GigclubMembershipBundle:MembershipType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MembershipType entity.');
        }

        $editForm = $this->createForm(new MembershipTypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing MembershipType entity.
     *
     * @Route("/{id}", name="membershiptype_update")
     * @Method("PUT")
     * @Template("GigclubMembershipBundle:MembershipType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GigclubMembershipBundle:MembershipType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MembershipType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MembershipTypeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('membershiptype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MembershipType entity.
     *
     * @Route("/{id}", name="membershiptype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GigclubMembershipBundle:MembershipType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MembershipType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('membershiptype'));
    }

    /**
     * Creates a form to delete a MembershipType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
