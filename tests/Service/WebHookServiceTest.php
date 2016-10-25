<?php

namespace HeliosHpp\Service;

use PHPUnit\Framework\TestCase;

/**
 * Class WebHookServiceTest
 *
 * @package HeliosHpp\Service
 */
class WebHookServiceTest extends TestCase
{
    /**
     * @covers \HeliosHpp\Service\WebHookService::__construct
     */
    public function testObjectCanBeConstructed()
    {
        $webHookService = new WebHookService();

        $this->assertInstanceOf('HeliosHpp\\Service\\WebHookService', $webHookService);

        return $webHookService;
    }
}