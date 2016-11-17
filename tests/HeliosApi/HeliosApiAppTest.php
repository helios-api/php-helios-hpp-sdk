<?php

namespace HeliosApi\Tests;

use HeliosApi\Exception\HeliosApiException;
use HeliosApi\HeliosApiApp;
use PHPUnit\Framework\TestCase;

class HeliosApiAppTest extends TestCase
{
    /**
     * @var string
     */
    public static $accountId;

    /**
     * @var string
     */
    public static $url;

    /**
     * @throws \HeliosHpp\Exception\HeliosHppException
     */
    public function setUp()
    {
        if(!file_exists(__DIR__ . '/HeliosApiTestCredentials.php')) {
            throw new HeliosApiException(
                'You must create a HeliosApiCredentials.php file from HeliosApiTestCredentials.php.dist'
            );
        }

        if(!strlen(\HeliosApi\Tests\HeliosApiTestCredentials::$accountId)
            || !strlen(HeliosApiTestCredentials::$url)
        ) {
            throw new HeliosApiException(
                'You must fill out HeliosApiCredentials.php'
            );
        }
        static::$accountId = HeliosApiTestCredentials::$accountId;
        static::$url = HeliosApiTestCredentials::$url;
    }

    /**
     * @covers \HeliosApi\HeliosApiApp::__construct
     */
    public function testObjectCanBeConstructed()
    {
        $heliosApiApp = new HeliosApiApp(self::$accountId, self::$url);

        $this->assertInstanceOf('HeliosApi\\HeliosApiApp', $heliosApiApp);

        return $heliosApiApp;
    }

    /**
     * @covers       \HeliosApi\HeliosApiApp::getApiService
     * @dataProvider serviceNameProvider
     * @depends      testObjectCanBeConstructed
     */
    public function testApiServiceCanBeRetrieved($serviceName, HeliosApiApp $heliosApiApp)
    {
        $apiService = $heliosApiApp->getApiService($serviceName);

        $this->assertInstanceOf('HeliosApi\\Service\\AbstractApiService', $apiService);

        return $apiService;
    }

    /**
     * @return array
     */
    public function serviceNameProvider()
    {
        return [
            ['channel'],
            ['payment'],
            ['payments.charge.credit_card']
        ];
    }
}
