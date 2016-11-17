<?php

namespace HeliosApi\Service\Payments\Charge;

use HeliosApi\Model\Charge\CreditCardCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class CreditCard3dSecureService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class CreditCard3dSecureService extends AbstractApiService
{
    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(CreditCardCharge $charge)
    {
        return $this->createPayment('/payments/charge/credit_card_3d_secure', $charge);
    }
}
