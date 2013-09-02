<?php

namespace Gigclub\MembershipBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Gigclub\MembershipBundle\Entity\MembershipType;

class MembershipTypeToIdTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (MembershipType) to a string (Id).
     *
     * @param  MembershipType|null $membershipType
     * @return string
     */
    public function transform($membershipType)
    {
        if (null === $membershipType) {
            return "";
        }

        return $membershipType->getId();
    }

    /**
     * Transforms a string (id) to an object (MembershipType).
     *
     * @param  string $id
     *
     * @return MembershipType|null
     *
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            throw new TransformationFailedException('No ID!');
        }

        $membershipType = $this->om
            ->getRepository('GigclubMembershipBundle:MembershipType')
            ->findOneBy(array('id' => $id))
        ;

        if (null === $membershipType) {
            throw new TransformationFailedException(sprintf(
                'An MembershipType with id "%s" does not exist!',
                $id
            ));
        }

        return $membershipType;
    }
}
