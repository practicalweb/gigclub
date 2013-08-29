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
            ->add('primary_member', 'hidden')
            ->add('title')
            ->add('forename')
            ->add('surname')
            ->add('male')
            ->add('age')
            ->add('dob')
            ->add('phone')
//            ->add('phone_as_primary')
            ->add('mobile')
//            ->add('mobile_as_primary')
            ->add('email')
//            ->add('email_as_primary')
            ->addEventSubscriber(new AddAsPrimaryFieldsSubscriber())
            ->add('privacy')
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
