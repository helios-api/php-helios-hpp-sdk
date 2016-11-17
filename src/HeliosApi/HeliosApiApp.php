<?php

namespace HeliosApi;

use HeliosApi\Exception\HeliosApiException;
use HeliosApi\Exception\HeliosApiServiceContainerException;
use HeliosApi\Service\AbstractApiService;

/**
 * Class HeliosApiApp
 *
 * @package HeliosApi
 */
class HeliosApiApp
{
    /**
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $apiVersion;

    /**
     * @var array
     */
    protected $servicesContainer;

    /**
     * HeliosApiApp constructor.
     *
     * @param string $accountId
     * @param string $url
     */
    public function __construct(
        $accountId,
        $url,
        $baseUrl = HeliosApi::API_BASE_URL,
        $apiVersion = HeliosApi::API_VERSION
    ) {
        if (!is_string($accountId) || !is_string($url) || !is_string($baseUrl) || !is_string($apiVersion)) {
            throw new HeliosApiException('The "accountId", "url", "baseUrl" and "apiVersion" must be provided.');
        }

        $this->accountId = $accountId;
        $this->url = $url;
        $this->baseUrl = $baseUrl;
        $this->apiVersion = $apiVersion;
        $this->servicesContainer = [];
    }

    /**
     * @param $serviceKey
     *
     * @return \HeliosApi\Service\AbstractApiService
     * @throws \HeliosApi\Exception\HeliosApiException
     * @throws \HeliosApi\Exception\HeliosApiServiceContainerException
     */
    public function getApiService($serviceKey)
    {
        if (isset($this->servicesContainer[$serviceKey])) {
            return $this->getService($serviceKey);
        }

        $serviceClass = $this->getServiceClass($serviceKey);

        try {
            $service = new $serviceClass($this->url, $this->accountId);
            $this->setService($serviceKey, $service);
        } catch (\Exception $exception) {
            throw new HeliosApiException("Error while constructing service $serviceClass", 0, $exception);
        }

        return $service;
    }

    /**
     * @param string $serviceKey
     * @param string $namespace
     * @param string $suffix
     *
     * @return string
     */
    protected function getServiceClass($serviceKey, $namespace = "\\HeliosApi\\Service\\", $suffix = "Service")
    {
        $classPath = explode('.', $serviceKey);
        $classPath = array_map(
            function ($pathPart) {
                return str_replace("_", "", ucwords($pathPart, "_"));
            },
            $classPath
        );

        return $namespace . implode("\\", $classPath) . $suffix;
    }

    /**
     * @param string             $serviceKey
     * @param AbstractApiService $service
     *
     * @return array
     */
    protected function setService($serviceKey, $service)
    {
        if (is_string($serviceKey) && $service instanceof AbstractApiService) {
            $this->servicesContainer[$serviceKey] = $service;
        }

        return $this->servicesContainer;
    }

    /**
     * @param string $serviceKey
     *
     * @return AbstractApiService
     * @throws \HeliosApi\Exception\HeliosApiServiceContainerException
     */
    protected function getService($serviceKey)
    {
        if (is_string($serviceKey)
            && isset($this->servicesContainer[$serviceKey])
            && $this->servicesContainer[$serviceKey] instanceof AbstractApiService
        ) {
            return $this->servicesContainer[$serviceKey];
        }

        throw new HeliosApiServiceContainerException("No such service $serviceKey");
    }
}
