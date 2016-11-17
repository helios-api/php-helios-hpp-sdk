<?php

namespace HeliosHpp\Service;

use HeliosHpp\Exception\WebHookBodyException;
use HeliosHpp\Exception\WebHookMethodException;
use HeliosHpp\Exception\WebHookRequestException;
use HeliosHpp\Serializer\JsonSerializer;
use GuzzleHttp\Psr7;

/**
 * Class WebHookService
 *
 * @package HeliosHpp\Service
 */
class WebHookService implements WebHookServiceInterface
{
    /**
     * Secret key
     *
     * @TODO: to be used in request source validation
     *
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $inputStream;

    /**
     * @var \HeliosHpp\Serializer\JsonSerializer
     */
    protected $serializer;

    /**
     * WebHookService constructor.
     *
     * @param string $secret
     */
    public function __construct($secret = '', $inputStream = 'php://input')
    {
        $this->secret = $secret;
        $this->inputStream;
        $this->serializer = new JsonSerializer();
    }

    /**
     * @param string $body
     * @param array  $headers
     * @param string $method
     *
     * @return \HeliosHpp\Model\PaymentStatusChange
     * @throws \HeliosHpp\Exception\WebHookRequestException
     */
    public function handleRequest($body = '', array $headers = array(), $method = 'POST')
    {
        try {
            $this->verifyRequestSource();
            $this->verifyMethod($method);
            $body = $body ?: $this->getRequestBody();
            return $this->verifyRequestBody($body);
        } catch (\Exception $exception) {
            throw new WebHookRequestException("Wrong payment update request! {$exception->getMessage()}");
        }
    }

    /**
     * @return string
     */
    public function getInputStream()
    {
        return $this->inputStream;
    }

    /**
     * @param string $inputStream
     *
     * @return WebHookService
     */
    public function setInputStream($inputStream)
    {
        $this->inputStream = $inputStream;
        return $this;
    }

    /**
     * @return string
     */
    protected function getRequestBody()
    {
        return file_get_contents($this->inputStream);
    }

    /**
     * @TODO add request source validation when available in Helios
     *
     * @param null $request
     *
     * @return bool
     */
    protected function verifyRequestSource($request = null)
    {
        return true;
    }

    /**
     * @param string $body
     *
     * @return \HeliosHpp\Model\PaymentStatusChange
     * @throws \HeliosHpp\Exception\WebHookBodyException
     */
    protected function verifyRequestBody($body)
    {
        try {
            return $this->serializer->deserialize($body, "HeliosHpp\\Model\\PaymentStatusChange");
        } catch (\InvalidArgumentException $exception) {
            throw new WebHookBodyException("Wrong request body! {$exception->getMessage()}");
        } catch (\Exception $exception) {
            throw new WebHookBodyException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string $method
     *
     * @return bool
     * @throws \HeliosHpp\Exception\WebHookMethodException
     */
    protected function verifyMethod($method)
    {
        if ($method === 'POST') {
            return true;
        }
        throw new WebHookMethodException("Wrong request method! Sent $method");
    }
}
