<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class BillingAddress
 *
 * @package HeliosApi\Model
 */
class BillingAddress
{
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
    protected $line1;

    /**
     * @Type("string")
     * @var string
     */
    protected $line2;

    /**
     * @Type("string")
     * @var string
     */
    protected $zipCode;

    /**
     * @Type("string")
     * @var string
     */
    protected $city;

    /**
     * @Type("string")
     * @var string
     */
    protected $state;

    /**
     * @Type("string")
     * @var string
     */
    protected $country;

    /**
     * BillingAddress constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $address
     * @param string $line1
     * @param string $line2
     * @param string $zipCode
     * @param string $city
     * @param string $state
     * @param string $country
     */
    public function __construct($firstName = '', $lastName = '', $line1 = '', $line2 = '', $zipCode = '', $city = '', $state = '', $country = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
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
     * @return BillingAddress
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
     * @return BillingAddress
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     *
     * @return BillingAddress
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * @param string $line2
     *
     * @return BillingAddress
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return BillingAddress
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return BillingAddress
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return BillingAddress
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return BillingAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->line1;
    }

    /**
     * @param string $address
     *
     * @return BillingAddress
     */
    public function setAddress($address)
    {
        $this->line1 = $address;
        return $this;
    }
}
