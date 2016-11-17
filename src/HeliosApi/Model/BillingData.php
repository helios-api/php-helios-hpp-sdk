<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class BillingData
 *
 * @package HeliosApi\Model
 */
class BillingData
{
    /**
     * @Type("string")
     * @var string
     */
    protected $cardBrand;

    /**
     * @Type("string")
     * @var string
     */
    protected $cardHolder;

    /**
     * @Type("string")
     * @var string
     */
    protected $cardNumber;

    /**
     * @Type("string")
     * @var string
     */
    protected $bic;

    /**
     * @Type("string")
     * @var string
     */
    protected $iban;

    /**
     * @Type("string")
     * @var string
     */
    protected $accountNumber;

    /**
     * @Type("string")
     * @var string
     */
    protected $holder;

    /**
     * @Type("string")
     * @var string
     */
    protected $routingNumber;

    /**
     * @Type("string")
     * @var string
     */
    protected $bankName;

    /**
     * @return string
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * @param string $cardBrand
     *
     * @return BillingData
     */
    public function setCardBrand($cardBrand)
    {
        $this->cardBrand = $cardBrand;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    /**
     * @param string $cardHolder
     *
     * @return BillingData
     */
    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     *
     * @return BillingData
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     *
     * @return BillingData
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     *
     * @return BillingData
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     *
     * @return BillingData
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     *
     * @return BillingData
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->routingNumber;
    }

    /**
     * @param string $routingNumber
     *
     * @return BillingData
     */
    public function setRoutingNumber($routingNumber)
    {
        $this->routingNumber = $routingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     *
     * @return BillingData
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
        return $this;
    }
}
