<?php

namespace Gigclub\MembershipBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gigclub\MembershipBundle\Form\DataTransformer\MembershipTypeToIdTransformer;

class MembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $entityManager = $options['em'];
        $transformer = new MembershipTypeToIdTransformer($entityManager);



        $builder
            //->add('join_date')
            //->add('active')
           // ->add('form')
            ->add('address1')
            ->add('address2', null, array('required' => false))
            ->add('address3', null, array('required' => false))
            ->add('town')
            ->add('county')
            ->add('postcode')

//           ->add('membershipType')
//            ->add('membershipType', 'entity', array('class' => 'GigclubMembershipBundle:MembershipType', 'data' => 1))
//            ->add('membershipType', 'hidden', array('data' => new \Gigclub\MembershipBundle\Entity\MembershipType()))
            ->add('members', 'collection', array('type' => new MemberType(), 'allow_add' => true, 'by_reference' => false))

        ;

           $builder->add($builder->create('membershipType', 'hidden')->addModelTransformer($transformer));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gigclub\MembershipBundle\Entity\Membership'
        ));
         $resolver->setRequired(array('em'));
    }

    public function getName()
    {
        return 'gigclub_membershipbundle_membershiptype';
    }
}
