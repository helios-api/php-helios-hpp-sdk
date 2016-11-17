<?php

namespace HeliosHpp\Service;

use HeliosHpp\Model\Payment;

/**
 * Interface PaymentServiceInterface
 *
 * @package HeliosHpp\Service
 */
interface PaymentServiceInterface
{
    /**
     * @param \HeliosHpp\Model\Payment $payment
     *
     * @return \HeliosHpp\Model\CreatedPayment
     */
    public function create(Payment $payment);
}
