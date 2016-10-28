<?php

namespace HeliosHpp\Model;

/**
 * Class Payment
 *
 * @TODO    remove account ID after authorization refactor
 *
 * @package HeliosHpp\Model
 */
class Payment extends AbstractSerializableModel
{
    /**
     * Account ID string
     *
     * @var string
     */
    private $accountId;

    /**
     * Currency string in ISO 4217
     *
     * @var string
     */
    private $currency;

    /**
     * Transaction amount in integer
     *
     * @var integer
     */
    private $amount;

    /**
     * @var string
     */
    private $reference;

    /**
     * Transaction timestamp
     *
     * @var int
     */
    private $timestamp;

    /**
     * Transaction signature
     *
     * @var string
     */
    private $signature;

    /**
     * Additional shipping amount
     *
     * @var string
     */
    private $amountShipping;

    /**
     * Additional tax amount
     *
     * @var string
     */
    private $amountTax;

    /**
     * @var string
     */
    private $shopCountry;

    /**
     * @var string
     */
    private $shopName;

    /**
     * @var string
     */
    private $transactionType;

    /**
     * @var string
     */
    private $test;

    /**
     * Transaction description
     *
     * @var string
     */
    private $description;

    /**
     * Url information object
     *
     * @var Url
     */
    private $url;

    /**
     * Customer information object
     *
     * @var Customer
     */
    private $customer;

    /**
     * Payment constructor.
     *
     * @param string                         $accountId
     * @param string                         $currency
     * @param integer                        $amount
     * @param string                         $reference
     * @param \HeliosHpp\Model\Url           $url
     * @param int                            $timestamp
     * @param string                         $signature
     * @param string                         $amountShipping
     * @param string                         $amountTax
     * @param string                         $shopCountry
     * @param string                         $shopName
     * @param string                         $transactionType
     * @param string                         $test
     * @param string                         $urlCallback
     * @param string                         $description
     * @param \HeliosHpp\Model\Customer|null $customer
     */
    public function __construct(
        $accountId,
        $currency,
        $amount,
        $reference = '',
        Url $url = null,
        $timestamp = 0,
        $signature = '',
        $amountShipping = '',
        $amountTax = '',
        $shopCountry = '',
        $shopName = '',
        $transactionType = '',
        $test = '',
        $urlCallback = '',
        $description = '',
        Customer $customer = null
    ) {
        $this->accountId = $accountId;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->reference = $reference;
        $this->url = $url;
        $this->timestamp = $timestamp;
        $this->signature = $signature;
        $this->amountShipping = $amountShipping;
        $this->amountTax = $amountTax;
        $this->shopCountry = $shopCountry;
        $this->shopName = $shopName;
        $this->transactionType = $transactionType;
        $this->test = $test;
        $this->urlCallback = $urlCallback;
        $this->description = $description;
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     *
     * @return Payment
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param integer $amount
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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     *
     * @return Payment
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     *
     * @return Payment
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     *
     * @return Payment
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountShipping()
    {
        return $this->amountShipping;
    }

    /**
     * @param string $amountShipping
     *
     * @return Payment
     */
    public function setAmountShipping($amountShipping)
    {
        $this->amountShipping = $amountShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountTax()
    {
        return $this->amountTax;
    }

    /**
     * @param string $amountTax
     *
     * @return Payment
     */
    public function setAmountTax($amountTax)
    {
        $this->amountTax = $amountTax;
        return $this;
    }

    /**
     * @return string
     */
    public function getShopCountry()
    {
        return $this->shopCountry;
    }

    /**
     * @param string $shopCountry
     *
     * @return Payment
     */
    public function setShopCountry($shopCountry)
    {
        $this->shopCountry = $shopCountry;
        return $this;
    }

    /**
     * @return string
     */
    public function getShopName()
    {
        return $this->shopName;
    }

    /**
     * @param string $shopName
     *
     * @return Payment
     */
    public function setShopName($shopName)
    {
        $this->shopName = $shopName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     *
     * @return Payment
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    /**
     * @return string
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param string $test
     *
     * @return Payment
     */
    public function setTest($test)
    {
        $this->test = $test;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Payment
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return Payment
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Payment
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }
}
