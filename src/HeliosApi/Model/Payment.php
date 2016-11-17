<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class Payment
 *
 * @package HeliosApi\Model
 */
class Payment
{
    /**
     * @Type("string")
     * @var string
     */
    protected $id;

    /**
     * @Type("string")
     * @var string
     */
    protected $rootId;

    /**
     * @Type("string")
     * @var string
     */
    protected $refId;

    /**
     * @Type("string")
     * @var string
     */
    protected $channelId;

    /**
     * @Type("string")
     * @var string
     */
    protected $channelName;

    /**
     * @Type("string")
     * @var string
     */
    protected $method;

    /**
     * @Type("string")
     * @var string
     */
    protected $type;

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
    protected $status;

    /**
     * @Type("array<string, string>")
     * @var array
     */
    protected $meta;

    /**
     * @Type("HeliosApi\Model\BillingAddress")
     * @var BillingAddress
     */
    protected $billingAddress;

    /**
     * Billing data, content depends on "type" field
     *
     * @Type("HeliosApi\Model\BillingData")
     * @var BillingData
     */
    protected $billingData;

    /**
     * @Type("HeliosApi\Model\CustomerInfo")
     * @var CustomerInfo
     */
    protected $customerInfo;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.uP'>")
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.uP'>")
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @Type("string")
     * @var string
     */
    protected $redirectUrl;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Payment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRootId()
    {
        return $this->rootId;
    }

    /**
     * @param string $rootId
     *
     * @return Payment
     */
    public function setRootId($rootId)
    {
        $this->rootId = $rootId;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * @param string $refId
     *
     * @return Payment
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     *
     * @return Payment
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelName()
    {
        return $this->channelName;
    }

    /**
     * @param string $channelName
     *
     * @return Payment
     */
    public function setChannelName($channelName)
    {
        $this->channelName = $channelName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return Payment
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Payment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

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
     * @return Payment
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
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     *
     * @return Payment
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
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
     * @return Payment
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * @return BillingData
     */
    public function getBillingData()
    {
        return $this->billingData;
    }

    /**
     * @param BillingData $billingData
     *
     * @return Payment
     */
    public function setBillingData($billingData)
    {
        $this->billingData = $billingData;
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
     * @return Payment
     */
    public function setCustomerInfo($customerInfo)
    {
        $this->customerInfo = $customerInfo;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return Payment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return Payment
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     *
     * @return Payment
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }
}
