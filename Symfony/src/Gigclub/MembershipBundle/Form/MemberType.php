<?php

namespace Gigclub\MembershipBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gigclub\MembershipBundle\Form\EventListener\AddRowerFieldsSubscriber;
use Gigclub\MembershipBundle\Form\EventListener\AddCoxFieldsSubscriber;
use Gigclub\MembershipBundle\Form\EventListener\AddAsPrimaryFieldsSubscriber;
class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('primary_member', 'checkbox', array('required' => false))
            ->add('title', null, array('required' => false))
            ->add('forename')
            ->add('surname')
            ->add('male', null, array('required' => false))
            ->add('age')
            ->add('dob')
            ->add('phone', null, array('required' => false))
//            ->add('phone_as_primary')
            ->add('mobile', null, array('required' => false))
//            ->add('mobile_as_primary')
            ->add('email', 'email')
//            ->add('email_as_primary')
            ->addEventSubscriber(new AddAsPrimaryFieldsSubscriber())
            ->add('privacy', 'checkbox', array('label' => 'I don\'t wat to share my contact details with club members', 'required' => false))
            ->addEventSubscriber(new AddRowerFieldsSubscriber())
            ->addEventSubscriber(new AddCoxFieldsSubscriber())
        ;
    }




            

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gigclub\MembershipBundle\Entity\Member'
        ));
    }

    public function getName()
    {
        return 'gigclub_membershipbundle_membertype';
    }
}
