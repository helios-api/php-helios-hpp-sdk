<?php

namespace HeliosHpp\Model;

/**
 * Class CreatedPayment
 *
 * @package HeliosHpp\Model
 */
class CreatedPayment extends AbstractSerializableModel
{
    /**
     * @var string
     */
    protected $token;

    /**
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
