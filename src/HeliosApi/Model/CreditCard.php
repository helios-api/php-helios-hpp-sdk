<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class CreditCard
 *
 * @package HeliosApi\Model
 */
class CreditCard
{
    /**
     * @Type("string")
     * @var string
     */
    protected $number;

    /**
     * @Type("string")
     * @var string
     */
    protected $holder;

    /**
     * @Type("string")
     * @var string
     */
    protected $cvc;

    /**
     * @Type("integer")
     * @var integer
     */
    protected $expirationYear;

    /**
     * @Type("integer")
     * @var integer
     */
    protected $expirationMonth;

    /**
     * @Type("string")
     * @var string
     */
    protected $statement;

    /**
     * CreditCard constructor.
     *
     * @param string $number
     * @param string $holder
     * @param string $cvc
     * @param int    $expirationYear
     * @param int    $expirationMonth
     * @param string $statement
     */
    public function __construct(
        $number = null,
        $holder = null,
        $cvc = null,
        $expirationYear = null,
        $expirationMonth = null,
        $statement = null
    ) {
        $this->number = $number;
        $this->holder = $holder;
        $this->cvc = $cvc;
        $this->expirationYear = $expirationYear;
        $this->expirationMonth = $expirationMonth;
        $this->statement = $statement;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return CreditCard
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param mixed $holder
     *
     * @return CreditCard
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
        return $this;
    }

    /**
     * @return string
     */
    public function getCvc()
    {
        return $this->cvc;
    }

    /**
     * @param string $cvc
     *
     * @return CreditCard
     */
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * @param int $expirationYear
     *
     * @return CreditCard
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param int $expirationMonth
     *
     * @return CreditCard
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * @param string $statement
     *
     * @return CreditCard
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;
        return $this;
    }
}
