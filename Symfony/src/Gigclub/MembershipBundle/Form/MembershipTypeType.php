<?php

namespace Gigclub\MembershipBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MembershipTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gigclub\MembershipBundle\Entity\MembershipType'
        ));
    }

    public function getName()
    {
        return 'gigclub_membershipbundle_membershiptypetype';
    }
}
