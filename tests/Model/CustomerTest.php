<?php

namespace HeliosHpp\Model;

use PHPUnit\Framework\TestCase;

/**
 * Class CustomerTest
 *
 * @package HeliosHpp\Model
 */
class CustomerTest extends TestCase
{
    /**
     * @covers \HeliosHpp\Model\Customer::__construct
     */
    public function testObjectCanBeConstructedWithMinimumParameters()
    {
        $customer = new Customer();

        $this->assertInstanceOf('HeliosHpp\\Model\\Customer', $customer);

        return $customer;
    }

    /**
     * @covers \HeliosHpp\Model\Customer::__construct
     */
    public function testObjectCanBeConstructedWithValidParameters()
    {
        $customer = new Customer('Joe', 'Doe', 'joe.doe@example.com', '123456789');

        $this->assertInstanceOf('HeliosHpp\\Model\\Customer', $customer);

        return $customer;
    }
}
