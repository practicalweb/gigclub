<?php

namespace Gigclub\MembershipBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Gigclub\MembershipBundle\Entity\Membership;
use Gigclub\MembershipBundle\Entity\Member;
use Gigclub\MembershipBundle\Form\MembershipType;

/**
 * Membership controller.
 *
 * @Route("/membership")
 */
class MembershipController extends Controller
{

    /**
     * Lists all Membership entities.
     *
     * @Route("/", name="membership")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GigclubMembershipBundle:Membership')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Membership entity.
     *
     * @Route("/", name="membership_create")
     * @Method("POST")
     * @Template("GigclubMembershipBundle:Membership:new.html.twig")
     */
    public function createAction(Request $request)
    {

        $entity  = new Membership();
        $form = $this->createForm(new MembershipType(), $entity, array('em' => $this->getDoctrine()->getManager()));
        //print_r($form);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('membership_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    

    /**
     * Displays a form to create a new Membership entity.
     *
     * @Route("/new", name="membership_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Membership();
        $em = $this->getDoctrine()->getManager();
        $single = $em->getRepository('GigclubMembershipBundle:MembershipType')->find(1);
        $entity->setMembershipType($single);
        $form   = $this->createForm(new MembershipType(), $entity, array('em' => $em));

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to create a new family Membership entity.
     *
     * @Route("/newfamily", name="membership_newfamily")
     * @Method("GET")
     * @Template()
     */
    public function newFamilyAction()
    {
        $entity = new Membership(2);
        $em = $this->getDoctrine()->getManager();
        $family = $em->getRepository('GigclubMembershipBundle:MembershipType')->find(2);
        $entity->setMembershipType($family);
        $form   = $this->createForm(new MembershipType(), $entity, array('em' => $em));

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Membership entity.
     *
     * @Route("/{id}", name="membership_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GigclubMembershipBundle:Membership')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Membership entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Membership entity.
     *
     * @Route("/{id}/edit", name="membership_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GigclubMembershipBundle:Membership')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Membership entity.');
        }

        $editForm = $this->createForm(new MembershipType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Membership entity.
     *
     * @Route("/{id}", name="membership_update")
     * @Method("PUT")
     * @Template("GigclubMembershipBundle:Membership:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GigclubMembershipBundle:Membership')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Membership entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MembershipType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('membership_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Membership entity.
     *
     * @Route("/{id}", name="membership_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GigclubMembershipBundle:Membership')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Membership entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('membership'));
    }

    /**
     * Creates a form to delete a Membership entity by id.
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
