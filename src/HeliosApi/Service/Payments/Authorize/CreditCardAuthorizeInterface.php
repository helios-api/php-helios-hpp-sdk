<?php

namespace HeliosApi\Service\Payments\Authorize;

use HeliosApi\Model\Charge\CreditCardCharge;

/**
 * Interface AuthorizeInterface
 *
 * @package HeliosApi\Service\Payments\Authorize
 */
interface CreditCardAuthorizeInterface
{
    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function authorize(CreditCardCharge $charge);
}
