<?php

namespace HeliosHpp\Service;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Psr7\Response;
use HeliosHpp\Exception\HeliosHppException;
use HeliosHpp\Exception\HeliosHppResponseException;
use HeliosHpp\Serializer\JsonSerializer;

/**
 * Class AbstractHppService
 *
 * @package HeliosApi\Service
 */
abstract class AbstractHppService
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
     * @var \HeliosHpp\Serializer\JsonSerializer
     */
    protected $serializer;

    /**
     * AbstractHppService constructor.
     *
     * @param string $url
     * @param string $authorizationToken
     */
    public function __construct($url, $authorizationToken = '')
    {
        if (!is_string($url)) {
            throw new HeliosHppException('The "url" must be provided.');
        }
        $this->url = $url;
        $this->authorizationToken = $authorizationToken;

        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            __DIR__ . "/../../vendor/jms/serializer/src"
        );
        AnnotationRegistry::registerLoader('class_exists');
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
     * @return AbstractHppService
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
     * @return AbstractHppService
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
     * @return AbstractHppService
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
        return $this;
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
            throw new HeliosHppResponseException("Wrong response body! {$exception->getMessage()}");
        }
    }
}
