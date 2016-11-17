<?php


namespace HeliosApi\Service;

use HeliosApi\Component\Request;

/**
 * Class PaymentService
 *
 * @package HeliosApi\Service
 */
class PaymentService extends AbstractApiService
{
    /**
     * @return \HeliosApi\Model\Payment[]
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function getList()
    {
        $request = new Request($this->url);
        $request
            ->setAuthorizationToken($this->authorizationToken)
            ->setMethod('GET')
            ->setEndpoint('/payments');

        $response = $request->send();

        $body = $this->checkResponse($response);
        return $this->serializer->deserialize($body, "ArrayCollection<HeliosApi\\Model\\Payment>");
    }
}
