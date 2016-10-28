<?php

namespace HeliosHpp\Model;

use PHPUnit\Framework\TestCase;

/**
 * Class UrlTest
 *
 * @package HeliosHpp\Model
 */
class UrlTest extends TestCase
{
    /**
     * @covers \HeliosHpp\Model\Customer::__construct
     */
    public function testObjectCanBeConstructedWithMinimumParameters()
    {
        $url = new Url();

        $this->assertInstanceOf('HeliosHpp\\Model\\Url', $url);

        return $url;
    }

    /**
     * @covers \HeliosHpp\Model\Customer::__construct
     */
    public function testObjectCanBeConstructedWithValidParameters()
    {
        $url = new Url('http://localhost/cancel', 'http://localhost/complete', 'http://localhost/callback');

        $this->assertInstanceOf('HeliosHpp\\Model\\Url', $url);

        return $url;
    }
}
