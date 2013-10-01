<?php

namespace Gigclub\MembershipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gigclub\MembershipBundle\Entity\Member;

/**
 * Membership
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gigclub\MembershipBundle\Entity\MembershipRepository")
 */
class Membership
{
    /**
     * @ORM\OneToMany(targetEntity="Member", mappedBy="membership", cascade="persist")
     */
    protected $members;


    /**
     * @ORM\ManyToOne(targetEntity="MembershipType", cascade="persist")
     * @ORM\JoinColumn(name="membership_type_id", referencedColumnName="id")
     **/
    private $membershipType;


    public function __construct($membercount=1)
    {
        $this->members = new ArrayCollection();
        for($i=0;$i<$membercount;$i++)
        {
           $member = new Member();
#print "$i $membercount";

           #$member->setTitle($i);
           if ($i == 0) {
              $member->setPrimaryMember(true);
           } else {
              $member->setPrimaryMember(false);
           }
           $this->addMember($member);
        }
        $this->join_date = new \DateTime();
        $this->active = true;
        $this->address1 = '';
        $this->address2 = '';
        $this->address3 = '';
        $this->towm = '';
        $this->postcode = '';
        

    }

    public function __toString()
    {
        return "$this->id";
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="join_date", type="date")
     */
    private $join_date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var boolean
     *
     * @ORM\Column(name="form", type="boolean", nullable=true)
     */
    private $form;

    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=255)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=255)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="address3", type="string", length=255)
     */
    private $address3;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=255)
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=255)
     */
    private $county;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=10)
     */
    private $postcode;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set join_date
     *
     * @param \DateTime $joinDate
     * @return Membership
     */
    public function setJoinDate($joinDate)
    {
        $this->join_date = $joinDate;
    
        return $this;
    }

    /**
     * Get join_date
     *
     * @return \DateTime 
     */
    public function getJoinDate()
    {
        return $this->join_date;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Membership
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set form
     *
     * @param boolean $form
     * @return Membership
     */
    public function setForm($form)
    {
        $this->form = $form;
    
        return $this;
    }

    /**
     * Get form
     *
     * @return boolean 
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Membership
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    
        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Membership
     */
    public function setAddress2($address2)
    {
        $this->address2 = "$address2";
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     * @return Membership
     */
    public function setAddress3($address3)
    {
        $this->address3 = "$address3";
    
        return $this;
    }

    /**
     * Get address3
     *
     * @return string 
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return Membership
     */
    public function setTown($town)
    {
        $this->town = $town;
    
        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set county
     *
     * @param string $county
     * @return Membership
     */
    public function setCounty($county)
    {
        $this->county = $county;
    
        return $this;
    }

    /**
     * Get county
     *
     * @return string 
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Membership
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Add members
     *
     * @param \Gigclub\MembershipBundle\Entity\Member $member
     * @return Membership
     */
    public function addMember(\Gigclub\MembershipBundle\Entity\Member $member)
    {	
        $member->setMembership($this);           
        $this->members->add($member);
    
        return $this;
    }

    /**
     * Remove members
     *
     * @param \Gigclub\MembershipBundle\Entity\Member $members
     */
    public function removeMember(\Gigclub\MembershipBundle\Entity\Member $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Set members
     *
     * @param \Gigclub\MembershipBundle\Entity\Member $members
     * @return Membership
     */
    public function setMembers(\Gigclub\MembershipBundle\Entity\Member $members = null)
    {
        $this->members = $members;
    
        return $this;
    }

    /**
     * Set membershipType
     *
     * @param \Gigclub\MembershipBundle\Entity\MembershipType $membershipType
     * @return Membership
     */
    public function setMembershipType(\Gigclub\MembershipBundle\Entity\MembershipType $membershipType = null)
    {
        $this->membershipType = $membershipType;
    
        return $this;
    }

    /**
     * Get membershipType
     *
     * @return \Gigclub\MembershipBundle\Entity\MembershipType 
     */
    public function getMembershipType()
    {
        return $this->membershipType;
    }
}
