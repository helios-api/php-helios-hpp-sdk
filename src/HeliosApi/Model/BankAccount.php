<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class BankAccount
 *
 * @package HeliosApi\Model
 */
class BankAccount
{
    /**
     * @Type("string")
     * @var string
     */
    protected $holder;

    /**
     * @Type("string")
     * @var string
     */
    protected $accountNumber;

    /**
     * @Type("string")
     * @var string
     */
    protected $routingNumber;

    /**
     * BankAccount constructor.
     *
     * @param string $holder
     * @param string $accountNumber
     * @param string $routingNumber
     */
    public function __construct($holder = null, $accountNumber = null, $routingNumber = null)
    {
        $this->holder = $holder;
        $this->accountNumber = $accountNumber;
        $this->routingNumber = $routingNumber;
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
     * @return BankAccount
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
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
     * @return BankAccount
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
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
     * @return BankAccount
     */
    public function setRoutingNumber($routingNumber)
    {
        $this->routingNumber = $routingNumber;
        return $this;
    }
}
