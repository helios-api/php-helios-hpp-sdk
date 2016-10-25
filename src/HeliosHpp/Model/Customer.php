<?php

namespace HeliosHpp\Model;

/**
 * Class Customer
 *
 * @package HeliosHpp\Model
 */
class Customer
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var Shipping
     */
    private $address;

    /**
     * Customer constructor.
     *
     * @param string                         $firstName
     * @param string                         $lastName
     * @param string                         $email
     * @param string                         $phone
     * @param \HeliosHpp\Model\Shipping|null $address
     */
    public function __construct($firstName = '', $lastName = '', $email = '', $phone = '', Shipping $address = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
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
     * @return Customer
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
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return Shipping
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Shipping $address
     *
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
}