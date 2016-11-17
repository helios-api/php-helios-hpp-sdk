<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\SepaCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class SepaService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class SepaService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\SepaCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(SepaCharge $charge)
    {
        return $this->createPayment('/payments/charge/sepa', $charge);
    }
}
