<?php

namespace HeliosHpp;

use HeliosHpp\Exception\HeliosHppException;
use HeliosHpp\Model\Payment;
use HeliosHpp\Service\PaymentService;
use HeliosHpp\Service\PaymentServiceInterface;
use HeliosHpp\Service\WebHookService;
use HeliosHpp\Service\WebHookServiceInterface;

/**
 * Class HeliosHppApp
 *
 * @package HeliosHpp
 */
class HeliosHppApp
{
    /**
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $apiVersion;

    /**
     * @var PaymentServiceInterface
     */
    protected $paymentService;

    /**
     * @var WebHookServiceInterface
     */
    protected $webHookService;

    /**
     * HeliosHppApp constructor.
     *
     * @param string $accountId
     * @param string $url
     */
    public function __construct($accountId, $url, $baseUrl = HeliosHpp::API_BASE_URL, $apiVersion = HeliosHpp::API_VERSION)
    {
        if (!is_string($accountId) || !is_string($url) || !is_string($baseUrl) || !is_string($apiVersion)) {
            throw new HeliosHppException('The "accountId", "url", "baseUrl" and "apiVersion" must be provided.');
        }

        $this->accountId = $accountId;
        $this->url = $url;
        $this->baseUrl = $baseUrl;
        $this->apiVersion = $apiVersion;
    }

    /**
     * @param \HeliosHpp\Model\Payment $payment
     *
     * @return \HeliosHpp\Model\CreatedPayment
     * @throws \HeliosHpp\Exception\HeliosHppException
     * @throws \HeliosHpp\Exception\PaymentBodyException
     */
    public function createPayment(Payment $payment)
    {
        $payment->setAccountId($this->accountId);
        return $this->getPaymentService()->create($payment);
    }

    /**
     * @return \HeliosHpp\Model\PaymentStatusChange
     */
    public function registerWebHook()
    {
        return $this->getWebHookService()->handleRequest();
    }


    /**
     * @return \HeliosHpp\Service\PaymentService|\HeliosHpp\Service\PaymentServiceInterface
     */
    public function getPaymentService()
    {
        if (!($this->paymentService instanceof PaymentServiceInterface)) {
            $this->paymentService = new PaymentService($this->accountId, $this->url);
        }

        return $this->paymentService;
    }


    /**
     * @return \HeliosHpp\Service\WebHookService|\HeliosHpp\Service\WebHookServiceInterface
     */
    public function getWebHookService()
    {
        if (!($this->webHookService instanceof WebHookServiceInterface)) {
            $this->webHookService = new WebHookService();
        }

        return $this->webHookService;
    }
}
