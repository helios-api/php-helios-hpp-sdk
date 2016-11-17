<?php

namespace HeliosApi\Service\Payments\Authorize;

use HeliosApi\Model\Charge\AbstractCharge;

/**
 * Interface AuthorizeInterface
 *
 * @package HeliosApi\Service\Payments\Authorize
 */
interface ChargeInterface
{
    /**
     * @param \HeliosApi\Model\Charge\AbstractCharge $charge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function charge(AbstractCharge $charge);
}
