<?php

namespace HeliosHpp;

use HeliosHpp\Model\CreatedPayment;
use HeliosHpp\Model\Payment;

/**
 * Class HeliosHpp
 *
 * @package HeliosHpp
 */
class HeliosHpp
{
    /**
     * @const string Version number of the Helios PHP SDK.
     */
    const VERSION = '0.0.1-dev';

    /**
     * @const string Helios Account ID
     */
    const APP_ACCOUNT_ID = 'APP_ACCOUNT_ID';

    /**
     * @const string Helios HPP URL
     */
    const APP_HPP_URL = 'APP_HPP_URL';

    /**
     * @const string Helios API version
     */
    const API_VERSION = 'v1';

    /**
     * @const string Helios API base path
     */
    const API_BASE_URL = '/api/';

    /**
     * @var HeliosHppApp
     */
    protected $heliosHppApp;

    /**
     * HeliosHpp constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config = array_merge(
            [
                'accountId' => getenv(static::APP_ACCOUNT_ID),
                'url'       => getenv(static::APP_HPP_URL),
                'baseUrl'   => getenv(static::API_BASE_URL),
                'apiVersion'   => getenv(static::API_VERSION)
            ],
            $config
        );

        $this->heliosHppApp = new HeliosHppApp($config['accountId'], $config['url'], $config['baseUrl'], $config['apiVersion']);
    }

    /**
     * @param \HeliosHpp\Model\Payment $payment
     *
     * @return CreatedPayment
     */
    public function createPayment(Payment $payment)
    {
        return $this->heliosHppApp->createPayment($payment);
    }

    /**
     * @return \HeliosHpp\Model\PaymentStatusChange
     */
    public function registerWebHook()
    {
        return $this->heliosHppApp->registerWebHook();
    }
}
