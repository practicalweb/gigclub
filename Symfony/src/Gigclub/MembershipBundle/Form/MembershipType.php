<?php

namespace Gigclub\MembershipBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('join_date')
            //->add('active')
           // ->add('form')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('town')
            ->add('county')
            ->add('postcode')
            ->add('membershipType')
            ->add('members', 'collection', array('type' => new MemberType()))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gigclub\MembershipBundle\Entity\Membership'
        ));
    }

    public function getName()
    {
        return 'gigclub_membershipbundle_membershiptype';
    }
}
