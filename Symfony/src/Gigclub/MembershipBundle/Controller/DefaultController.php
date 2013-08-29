<?php

namespace Gigclub\MembershipBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Gigclub\MembershipBundle\Entity\Membership;
use Gigclub\MembershipBundle\Entity\Member;
use Gigclub\MembershipBundle\Form\MemberType;
use Gigclub\MembershipBundle\Form\MembershipType;


class DefaultController extends Controller
{
    /**
     * @Route("/" ,name="gigclub_membership_default_index")
     * @Method("GET")
     * @Template()    
     */
    public function indexAction(Request $request)
    { 

        $entity = new Membership();
        $form   = $this->createForm(new MembershipType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
/*

        // create a task and give it some dummy data for this example
        $Membership = new Membership();


$member1 = new Member();
$Membership->getMembers()->add($member1);
#$member2 = new Member();
#$Membership->getMembers()->add($member2);

        $form = $this->createFormBuilder($Membership)
->add('members', 'collection', array('type' => new MemberType()))
 
          //  ->add('Id', 'number')
           // ->add('joinDate', 'date', array('widget' => 'single_text'))
          //  ->add('active', 'checkbox')
          //  ->add('form', 'checkbox')
            ->add('address1', 'text')
            ->add('address2', 'text')
            ->add('address3','text')
            ->add('town', 'text')
            ->add('county', 'text')
            ->add('postcode', 'text')
->add('membershipType', 'entity', array(
'class' => 'GigclubMembershipBundle:MembershipType',
 'property' => 'name'))

            

        
            ->add('save', 'submit')
             ->getForm();


    $form->handleRequest($request);

    if ($form->isValid()) {
        // perform some action, such as saving the task to the database
    $em = $this->getDoctrine()->getManager();
    $em->persist($Membership);
    $em->flush();
#        return $this->redirect($this->generateUrl('task_success'));
    }
#        return array();
  return $this->render('GigclubMembershipBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
*/
    }

}
