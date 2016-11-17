<?php

namespace HeliosHpp\Component;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\TransferStats;
use HeliosHpp\Exception\HeliosHppException;
use HeliosHpp\HeliosHpp;

/**
 * Class Request
 *
 * @package HeliosHpp\Component
 */
class Request
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $payload;

    /**
     * @var string
     */
    protected $authorizationToken;

    /**
     * Request constructor.
     *
     * @param        $baseUri
     * @param string $method
     * @param string $endpoint
     * @param string $payload
     */
    public function __construct($baseUri, $method = '', $endpoint = '', $payload = '', $authorizationToken = '')
    {
        if (!is_string($baseUri)) {
            throw new HeliosHppException('The "baseUri" must be provided.');
        }

        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->payload = $payload;
        $this->client = new Client(['base_uri' => $baseUri]);
        $this->authorizationToken = $authorizationToken;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function send()
    {
        $response = null;
        $url = '';
        try {
            $response = $this->client->request(
                $this->method,
                $this->getEndpointUrl(),
                [
                    'headers'  => [
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                        'Authorization' => $this->getAuthorizationToken()
                    ],
                    'body'     => $this->payload,
                    'on_stats' => function (TransferStats $stats) use (&$url) {
                        $url = $stats->getEffectiveUri();
                    }
                ]
            );
        } catch (ClientException $e) {
            throw new HeliosHppException(Psr7\str($e->getRequest()));
        } catch (RequestException $e) {
            throw new HeliosHppException(Psr7\str($e->getRequest()));
//            if($e->hasResponse()) {
//                echo Psr7\str($e->getResponse());
//            }
        }

        return $response;
    }

    /**
     * @return string
     */
    protected function getEndpointUrl()
    {
        $urlArray = array(
            trim(HeliosHpp::API_BASE_URL, "/"),
            trim(HeliosHpp::API_VERSION, "/"),
            trim($this->endpoint, "/")
        );
        return implode('/', $urlArray);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     *
     * @return Request
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return Request
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     *
     * @return Request
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
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
     * @return Request
     */
    public function setAuthorizationToken($authorizationToken)
    {
        $this->authorizationToken = $authorizationToken;
        return $this;
    }
}
