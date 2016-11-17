<?php

namespace HeliosHpp\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class Payment
 *
 * @package HeliosHpp\Model
 */
class Payment
{
    /**
     * Currency string in ISO 4217
     *
     * @Type("string")
     * @var string
     */
    protected $currency;

    /**
     * Transaction amount in integer
     *
     * @Type("integer")
     * @var integer
     */
    protected $amount;

    /**
     * @Type("string")
     * @var string
     */
    protected $customerEmail;

    /**
     * @Type("string")
     * @var string
     */
    protected $transactionId;

    /**
     * @Type("string")
     * @var string
     */
    protected $statementName;

    /**
     * @Type("HeliosHpp\Model\BillingInfo")
     * @var BillingInfo
     */
    protected $billingInfo;

    /**
     * @var object
     */
    protected $meta;

    /**
     * Payment constructor.
     *
     * @param string                       $currency
     * @param int                          $amount
     * @param string                       $customerEmail
     * @param string                       $transactionId
     * @param string                       $statementName
     * @param \HeliosHpp\Model\BillingInfo $billingInfo
     * @param                              $meta
     */
    public function __construct(
        $currency = null,
        $amount = null,
        $customerEmail = null,
        $transactionId = null,
        $statementName = null,
        \HeliosHpp\Model\BillingInfo $billingInfo = null,
        $meta = null
    ) {
        $this->currency = $currency;
        $this->amount = $amount;
        $this->customerEmail = $customerEmail;
        $this->transactionId = $transactionId;
        $this->statementName = $statementName;
        $this->billingInfo = $billingInfo;
        $this->meta = $meta;
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
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     *
     * @return Payment
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     *
     * @return Payment
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatementName()
    {
        return $this->statementName;
    }

    /**
     * @param string $statementName
     *
     * @return Payment
     */
    public function setStatementName($statementName)
    {
        $this->statementName = $statementName;
        return $this;
    }

    /**
     * @return BillingInfo
     */
    public function getBillingInfo()
    {
        return $this->billingInfo;
    }

    /**
     * @param BillingInfo $billingInfo
     *
     * @return Payment
     */
    public function setBillingInfo($billingInfo)
    {
        $this->billingInfo = $billingInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param mixed $meta
     *
     * @return Payment
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }
}
