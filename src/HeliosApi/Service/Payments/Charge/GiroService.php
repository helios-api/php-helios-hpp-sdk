<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\GiroCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class GiroService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class GiroService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\GiroCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(GiroCharge $charge)
    {
        return $this->createPayment('/payments/charge/giro', $charge);
    }
}
