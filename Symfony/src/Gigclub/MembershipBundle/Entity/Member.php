<?php

namespace Gigclub\MembershipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gigclub\MembershipBundle\Entity\MemberRepository")
 */
class Member
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="primary_member", type="boolean")
     */
    private $primary_member;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Membership", inversedBy="members")
     * @ORM\JoinColumn(name="membership_id", referencedColumnName="id") 
     */
    private $membership;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=10)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="forename", type="string", length=255)
     */
    private $forename;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var boolean
     *
     * @ORM\Column(name="male", type="boolean")
     */
    private $male;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date")
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="phone_as_primary", type="boolean")
     */
    private $phone_as_primary;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255)
     */
    private $mobile;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mobile_as_primary", type="boolean")
     */
    private $mobile_as_primary;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_as_primary", type="boolean")
     */
    private $email_as_primary;

    /**
     * @var boolean
     *
     * @ORM\Column(name="privacy", type="boolean")
     */
    private $privacy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="squad", type="boolean")
     */
    private $squad;

    /**
     * @var integer
     *
     * @ORM\Column(name="strength", type="integer", nullable=true)
     */
    private $strength;

    /**
     * @var integer
     *
     * @ORM\Column(name="ability", type="integer", nullable=true)
     */
    private $ability;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bow", type="boolean", nullable=true)
     */
    private $bow;

    /**
     * @var boolean
     *
     * @ORM\Column(name="stroke", type="boolean", nullable=true)
     */
    private $stroke;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cox", type="boolean")
     */
    private $cox;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cox_active", type="boolean", nullable=true)
     */ 
    private $cox_active;

    /**
     * @var string
     *
     * @ORM\Column(name="crb_no", type="string", length=255, nullable=true)
     */
    private $crb_no;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="crb_date", type="date", nullable=true)
     */
    private $crb_date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="level_1_course", type="boolean", nullable=true)
     */
    private $level_1_course;

    /**
     * @var boolean
     *
     * @ORM\Column(name="under_instruction", type="boolean", nullable=true)
     */
    private $under_instruction;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vhf_license", type="boolean", nullable=true)
     */
    private $vhf_license;

    /**
     * @var boolean
     *
     * @ORM\Column(name="level_2_coaching", type="boolean", nullable=true)
     */
    private $level_2_coaching;

    /**
     * @var string
     *
     * @ORM\Column(name="coxing_availability", type="string", length=255, nullable=true)
     */
    private $coxing_availability;

    /**
     * @var string
     *
     * @ORM\Column(name="cox_comment", type="text", nullable=true)
     */
    private $cox_comment;

    public function __toString() 
    {
        return "$this->title $this->forename $this->surname"; 
    }

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
     * Set primary_member
     *
     * @param boolean $primaryMember
     * @return Member
     */
    public function setPrimaryMember($primaryMember)
    {
        $this->primary_member = $primaryMember;
    
        return $this;
    }

    /**
     * Get primary_member
     *
     * @return boolean 
     */
    public function getPrimaryMember()
    {
        return $this->primary_member;
    }

   
    /**
     * Set title
     *
     * @param string $title
     * @return Member
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set forename
     *
     * @param string $forename
     * @return Member
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
    
        return $this;
    }

    /**
     * Get forename
     *
     * @return string 
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Member
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set male
     *
     * @param boolean $male
     * @return Member
     */
    public function setMale($male)
    {
        $this->male = $male;
    
        return $this;
    }

    /**
     * Get male
     *
     * @return boolean 
     */
    public function getMale()
    {
        return $this->male;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Member
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return Member
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    
        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Member
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone_as_primary
     *
     * @param boolean $phoneAsPrimary
     * @return Member
     */
    public function setPhoneAsPrimary($phoneAsPrimary)
    {
        $this->phone_as_primary = $phoneAsPrimary;
    
        return $this;
    }

    /**
     * Get phone_as_primary
     *
     * @return boolean 
     */
    public function getPhoneAsPrimary()
    {
        return $this->phone_as_primary;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Member
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    
        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set mobile_as_primary
     *
     * @param boolean $mobileAsPrimary
     * @return Member
     */
    public function setMobileAsPrimary($mobileAsPrimary)
    {
        $this->mobile_as_primary = $mobileAsPrimary;
    
        return $this;
    }

    /**
     * Get mobile_as_primary
     *
     * @return boolean 
     */
    public function getMobileAsPrimary()
    {
        return $this->mobile_as_primary;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email_as_primary
     *
     * @param boolean $emailAsPrimary
     * @return Member
     */
    public function setEmailAsPrimary($emailAsPrimary)
    {
        $this->email_as_primary = $emailAsPrimary;
    
        return $this;
    }

    /**
     * Get email_as_primary
     *
     * @return boolean 
     */
    public function getEmailAsPrimary()
    {
        return $this->email_as_primary;
    }

    /**
     * Set privacy
     *
     * @param boolean $privacy
     * @return Member
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
    
        return $this;
    }

    /**
     * Get privacy
     *
     * @return boolean 
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Set squad
     *
     * @param boolean $squad
     * @return Member
     */
    public function setSquad($squad)
    {
        $this->squad = $squad;
    
        return $this;
    }

    /**
     * Get squad
     *
     * @return boolean 
     */
    public function getSquad()
    {
        return $this->squad;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     * @return Member
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    
        return $this;
    }

    /**
     * Get strength
     *
     * @return integer 
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set ability
     *
     * @param integer $ability
     * @return Member
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;
    
        return $this;
    }

    /**
     * Get ability
     *
     * @return integer 
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * Set bow
     *
     * @param boolean $bow
     * @return Member
     */
    public function setBow($bow)
    {
        $this->bow = $bow;
    
        return $this;
    }

    /**
     * Get bow
     *
     * @return boolean 
     */
    public function getBow()
    {
        return $this->bow;
    }

    /**
     * Set stroke
     *
     * @param boolean $stroke
     * @return Member
     */
    public function setStroke($stroke)
    {
        $this->stroke = $stroke;
    
        return $this;
    }

    /**
     * Get stroke
     *
     * @return boolean 
     */
    public function getStroke()
    {
        return $this->stroke;
    }

    /**
     * Set cox
     *
     * @param boolean $cox
     * @return Member
     */
    public function setCox($cox)
    {
        $this->cox = $cox;
    
        return $this;
    }

    /**
     * Get cox
     *
     * @return boolean 
     */
    public function getCox()
    {
        return $this->cox;
    }

    /**
     * Set cox_active
     *
     * @param boolean $coxActive
     * @return Member
     */
    public function setCoxActive($coxActive)
    {
        $this->cox_active = $coxActive;
    
        return $this;
    }

    /**
     * Get cox_active
     *
     * @return boolean 
     */
    public function getCoxActive()
    {
        return $this->cox_active;
    }

    /**
     * Set crb_no
     *
     * @param string $crbNo
     * @return Member
     */
    public function setCrbNo($crbNo)
    {
        $this->crb_no = $crbNo;
    
        return $this;
    }

    /**
     * Get crb_no
     *
     * @return string 
     */
    public function getCrbNo()
    {
        return $this->crb_no;
    }

    /**
     * Set crb_date
     *
     * @param \DateTime $crbDate
     * @return Member
     */
    public function setCrbDate($crbDate)
    {
        $this->crb_date = $crbDate;
    
        return $this;
    }

    /**
     * Get crb_date
     *
     * @return \DateTime 
     */
    public function getCrbDate()
    {
        return $this->crb_date;
    }

    /**
     * Set level_1_course
     *
     * @param boolean $level1Course
     * @return Member
     */
    public function setLevel1Course($level1Course)
    {
        $this->level_1_course = $level1Course;
    
        return $this;
    }

    /**
     * Get level_1_course
     *
     * @return boolean 
     */
    public function getLevel1Course()
    {
        return $this->level_1_course;
    }

    /**
     * Set under_instruction
     *
     * @param boolean $underInstruction
     * @return Member
     */
    public function setUnderInstruction($underInstruction)
    {
        $this->under_instruction = $underInstruction;
    
        return $this;
    }

    /**
     * Get under_instruction
     *
     * @return boolean 
     */
    public function getUnderInstruction()
    {
        return $this->under_instruction;
    }

    /**
     * Set vhf_license
     *
     * @param boolean $vhfLicense
     * @return Member
     */
    public function setVhfLicense($vhfLicense)
    {
        $this->vhf_license = $vhfLicense;
    
        return $this;
    }

    /**
     * Get vhf_license
     *
     * @return boolean 
     */
    public function getVhfLicense()
    {
        return $this->vhf_license;
    }

    /**
     * Set level_2_coaching
     *
     * @param boolean $level2Coaching
     * @return Member
     */
    public function setLevel2Coaching($level2Coaching)
    {
        $this->level_2_coaching = $level2Coaching;
    
        return $this;
    }

    /**
     * Get level_2_coaching
     *
     * @return boolean 
     */
    public function getLevel2Coaching()
    {
        return $this->level_2_coaching;
    }

    /**
     * Set coxing_availability
     *
     * @param string $coxingAvailability
     * @return Member
     */
    public function setCoxingAvailability($coxingAvailability)
    {
        $this->coxing_availability = $coxingAvailability;
    
        return $this;
    }

    /**
     * Get coxing_availability
     *
     * @return string 
     */
    public function getCoxingAvailability()
    {
        return $this->coxing_availability;
    }

    /**
     * Set cox_comment
     *
     * @param string $coxComment
     * @return Member
     */
    public function setCoxComment($coxComment)
    {
        $this->cox_comment = $coxComment;
    
        return $this;
    }

    /**
     * Get cox_comment
     *
     * @return string 
     */
    public function getCoxComment()
    {
        return $this->cox_comment;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
          $this->squad = false;
          $this->cox = false;
          $this->phone_as_primary = false;
          $this->mobile_as_primary = false;
          $this->email_as_primary = false;
          
 //       $this->membership = new \Gigclub\MembershipBundle\Entity\Membership();
    }
    

    /**
     * Get membership
     *
     * @return \Gigclub\MembershipBundle\Entity\Membership  
     */
    public function getMembership()
    {
        return $this->membership;
    }

    /**
     * Set membership
     *
     * @param \Gigclub\MembershipBundle\Entity\Membership $membership
     * @return Member
     */
    public function setMembership(\Gigclub\MembershipBundle\Entity\Membership $membership = null)
    {
        $this->membership = $membership;
    
        return $this;
    }
}
