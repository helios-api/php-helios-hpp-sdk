<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\IdealCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class IdealService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class IdealService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\IdealCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(IdealCharge $charge)
    {
        return $this->createPayment('/payments/charge/ideal', $charge);
    }
}
