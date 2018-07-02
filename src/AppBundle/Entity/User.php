<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var int
     * 
     * @ORM\Column(name="id")
     * 
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="firstname")
     * 
     */
    private $firstname;

    /**
     * @var string
     * 
     * @ORM\Column(name="lastname")
     * 
     */
    private $lastname;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="birthday")
     * 
     */
    private $birthdayType;

    /**
     * @var string
     * 
     * @ORM\Column(name="email")
     * 
     */
    private $email;

    /**
     * @var string
     * 
     * @ORM\Column(name="gender")
     * 
     */
    private $gender;

    /**
     * @var string
     * 
     * @ORM\Column(name="country")
     * 
     */
    private $country;

    /**
     * @var string
     * 
     * @ORM\Column(name="job")
     * 
     */
    private $job;


    /**
     * Get id
     * 
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthdayType
     *
     * @param \DateTime $birthdayType
     *
     * @return User
     */
    public function setBirthdayType($birthdayType)
    {
        $this->birthdayType = $birthdayType;

        return $this;
    }

    /**
     * Get birthdayType
     *
     * @return \DateTime
     */
    public function getBirthdayType()
    {
        return $this->birthdayType;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set job
     *
     * @param string $job
     *
     * @return User
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }
}

