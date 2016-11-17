<?php

namespace HeliosApi\Service\Payments\Authorize;

use HeliosApi\Model\Charge\CreditCardCharge;
use HeliosApi\Service\AbstractApiService;

/**
 * Class CreditCard3dSecureService
 *
 * @package HeliosApi\Service\Payments\Charge
 */
class CreditCard3dSecureService extends AbstractApiService implements CreditCardAuthorizeInterface
{
    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function authorize(CreditCardCharge $charge)
    {
        return $this->createPayment('/payments/authorize/credit_card_3d_secure', $charge);
    }
}
