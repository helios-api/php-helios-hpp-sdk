<?php

namespace HeliosHpp\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class BillingInfo
 *
 * @package HeliosHpp\Model
 */
class BillingInfo
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
    protected $companyName;

    /**
     * @Type("string")
     * @SerializedName("address_1")
     * @var string
     */
    protected $address1;

    /**
     * @Type("string")
     * @SerializedName("address_2")
     * @var string
     */
    protected $address2;

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
    protected $zipCode;

    /**
     * @Type("string")
     * @var string
     */
    protected $country;

    /**
     * BillingInfo constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $companyName
     * @param string $address1
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param string $zipCode
     * @param string $country
     */
    public function __construct(
        $firstName = null,
        $lastName = null,
        $companyName = null,
        $address1 = null,
        $address2 = null,
        $city = null,
        $state = null,
        $zipCode = null,
        $country = null
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->companyName = $companyName;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
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
     * @return BillingInfo
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
     * @return BillingInfo
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     *
     * @return BillingInfo
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     *
     * @return BillingInfo
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     *
     * @return BillingInfo
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
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
     * @return BillingInfo
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
     * @return BillingInfo
     */
    public function setState($state)
    {
        $this->state = $state;
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
     * @return BillingInfo
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
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
     * @return BillingInfo
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
}
