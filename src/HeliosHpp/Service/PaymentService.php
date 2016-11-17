<?php

namespace HeliosHpp\Service;

use HeliosHpp\Component\Request;
use HeliosHpp\Model\Payment;

/**
 * Class PaymentService
 *
 * @TODO    handle Helios errors when ready
 *
 * @package HeliosHpp\Service
 */
class PaymentService extends AbstractHppService implements PaymentServiceInterface
{
    /**
     * @param \HeliosHpp\Model\Payment $payment
     *
     * @return \HeliosHpp\Model\CreatedPayment
     * @throws \HeliosHpp\Exception\HeliosHppException
     * @throws \HeliosHpp\Exception\PaymentBodyException
     */
    public function create(Payment $payment)
    {
        $request = new Request($this->url);
        $request
            ->setMethod('POST')
            ->setEndpoint('/payments')
            ->setAuthorizationToken($this->getAuthorizationToken())
            ->setPayload($this->serializer->serialize(array('payment' => $payment)));

        $response = $request->send();
        $body = $this->checkResponse($response);
        return $this->serializer->deserialize($body, "HeliosHpp\\Model\\CreatedPayment");
    }
}
