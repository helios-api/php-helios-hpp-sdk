<?php

namespace HeliosHpp\Service;

use HeliosHpp\Model\Payment;

interface PaymentServiceInterface
{
    public function create(Payment $payment);
}
