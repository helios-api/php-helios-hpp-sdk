<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\EpsCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class EpsService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class EpsService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\EpsCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(EpsCharge $charge)
    {
        return $this->createPayment('/payments/charge/eps', $charge);
    }
}
