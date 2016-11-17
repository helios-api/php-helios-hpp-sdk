<?php

namespace HeliosHpp\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class CreatedPayment
 *
 * @package HeliosHpp\Model
 */
class CreatedPayment
{
    /**
     * @Type("string")
     * @var string
     */
    protected $token;

    /**
     * @Type("string")
     * @var string
     */
    protected $paymentPageUrl;

    /**
     * CreatedPayment constructor.
     *
     * @param string $token
     * @param string $paymentPageUrl
     */
    public function __construct($token = '', $paymentPageUrl = '')
    {
        $this->token = $token;
        $this->paymentPageUrl = $paymentPageUrl;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return CreatedPayment
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentPageUrl()
    {
        return $this->paymentPageUrl;
    }

    /**
     * @param string $paymentPageUrl
     *
     * @return CreatedPayment
     */
    public function setPaymentPageUrl($paymentPageUrl)
    {
        $this->paymentPageUrl = $paymentPageUrl;
        return $this;
    }
}
