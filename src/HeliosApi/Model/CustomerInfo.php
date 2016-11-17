<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class CustomerInfo
 *
 * @package HeliosApi\Model
 */
class CustomerInfo
{
    /**
     * @Type("string")
     * @var string
     */
    protected $ip;

    /**
     * @Type("string")
     * @var string
     */
    protected $email;

    /**
     * @Type("string")
     * @var string
     */
    protected $firstName;

    /**
     * @Type("string")
     * @var string
     */
    protected $lastName;

    /**
     * @Type("string")
     * @var string
     */
    protected $phoneNumber;

    /**
     * @Type("DateTime<'Y-m-d'>")
     * @var \DateTime
     */
    protected $dateOfBirth;

    /**
     * CustomerInfo constructor.
     *
     * @param string $ip
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $dateOfBirth
     */
    public function __construct(
        $ip = null,
        $email = null,
        $firstName = null,
        $lastName = null,
        $phoneNumber = null,
        $dateOfBirth = null
    ) {
        $this->ip = $ip;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     *
     * @return CustomerInfo
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return CustomerInfo
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return CustomerInfo
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return CustomerInfo
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return CustomerInfo
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     *
     * @return CustomerInfo
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }
}
