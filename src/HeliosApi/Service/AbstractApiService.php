<?php

namespace HeliosApi\Service;

use GuzzleHttp\Psr7\Response;
use HeliosApi\Component\Request;
use HeliosApi\Exception\HeliosApiResponseException;
use HeliosApi\Exception\HeliosApiSdkException;
use HeliosApi\Model\Charge\AbstractCharge;
use HeliosApi\Serializer\JsonSerializer;

/**
 * Class AbstractApiService
 *
 * @package HeliosApi\Service
 */
abstract class AbstractApiService
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $authorizationToken;

    /**
     * @var \HeliosApi\Serializer\JsonSerializer
     */
    protected $serializer;

    /**
     * AbstractApiService constructor.
     *
     * @param string $url
     * @param string $authorizationToken
     */
    public function __construct($url, $authorizationToken = '')
    {
        if (!is_string($url)) {
            throw new HeliosApiSdkException('The "url" must be provided.');
        }
        $this->url = $url;
        $this->authorizationToken = $authorizationToken;
        $this->serializer = new JsonSerializer();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return AbstractApiService
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationToken()
    {
        return $this->authorizationToken;
    }

    /**
     * @param string $authorizationToken
     *
     * @return AbstractApiService
     */
    public function setAuthorizationToken($authorizationToken)
    {
        $this->authorizationToken = $authorizationToken;
        return $this;
    }

    /**
     * @return JsonSerializer
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * @param JsonSerializer $serializer
     *
     * @return AbstractApiService
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * @param string                                 $endpoint
     * @param \HeliosApi\Model\Charge\AbstractCharge $payloadObject
     *
     * @return array|\JMS\Serializer\scalar|mixed|object
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function createPayment($endpoint, AbstractCharge $charge)
    {
        $request = new Request($this->url);
        $request
            ->setMethod('POST')
            ->setEndpoint($endpoint)
            ->setAuthorizationToken($this->getAuthorizationToken())
            ->setPayload($this->serializer->serialize($charge));

        $response = $request->send();
        $body = $this->checkResponse($response);
        return $this->serializer->deserialize($body, "HeliosApi\\Model\\Payment");
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return string
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    protected function checkResponse(Response $response)
    {
        try {
            return $response->getBody()->getContents();
        } catch (\InvalidArgumentException $exception) {
            throw new HeliosApiResponseException("Wrong response body! {$exception->getMessage()}");
        }
    }
}
