<?php

namespace HeliosApi\Model\Charge;

use HeliosApi\Model\BillingAddress;
use HeliosApi\Model\CustomerInfo;
use JMS\Serializer\Annotation\Type;

/**
 * Class AbstractCharge
 *
 * @package HeliosApi\Model
 */
abstract class AbstractCharge implements ChargeInterface
{
    /**
     * @Type("integer")
     * @var integer
     */
    protected $amount;

    /**
     * @Type("string")
     * @var string
     */
    protected $currency;

    /**
     * @Type("string")
     * @var string
     */
    protected $descriptor;

    /**
     * @var object
     */
    protected $meta;

    /**
     * @Type("HeliosApi\Model\CustomerInfo")
     * @var CustomerInfo
     */
    protected $customerInfo;

    /**
     * @Type("HeliosApi\Model\BillingAddress")
     * @var BillingAddress
     */
    protected $billingAddress;

    /**
     * @Type("integer")
     * @var integer
     */
    protected $channelId;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return AbstractCharge
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return AbstractCharge
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return object
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param object $meta
     *
     * @return AbstractCharge
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * @return CustomerInfo
     */
    public function getCustomerInfo()
    {
        return $this->customerInfo;
    }

    /**
     * @param CustomerInfo $customerInfo
     *
     * @return AbstractCharge
     */
    public function setCustomerInfo($customerInfo)
    {
        $this->customerInfo = $customerInfo;
        return $this;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param BillingAddress $billingAddress
     *
     * @return AbstractCharge
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * @return int
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param int $channelId
     *
     * @return AbstractCharge
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }

    /**
     * @param string $descriptor
     *
     * @return AbstractCharge
     */
    public function setDescriptor($descriptor)
    {
        $this->descriptor = $descriptor;
        return $this;
    }
}
