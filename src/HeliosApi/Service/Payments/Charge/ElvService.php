<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\ElvCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class ElvService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class ElvService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\ElvCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(ElvCharge $charge)
    {
        return $this->createPayment('/payments/charge/elv', $charge);
    }
}
