<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\SofortCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class SofortService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class SofortService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\SofortCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(SofortCharge $charge)
    {
        return $this->createPayment('/payments/charge/sofort', $charge);
    }
}
