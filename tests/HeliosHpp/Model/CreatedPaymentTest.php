<?php

namespace HeliosHpp\Model;

use PHPUnit\Framework\TestCase;

/**
 * Class CreatedPaymentTest
 *
 * @package HeliosHpp\Model
 */
class CreatedPaymentTest extends TestCase
{
    /**
     * @covers \HeliosHpp\Model\Customer::__construct
     */
    public function testObjectCanBeConstructedWithMinimumParameters()
    {
        $createdPayment = new CreatedPayment();

        $this->assertInstanceOf('HeliosHpp\\Model\\CreatedPayment', $createdPayment);

        return $createdPayment;
    }

    /**
     * @covers \HeliosHpp\Model\Customer::__construct
     */
    public function testObjectCanBeConstructedWithValidParameters()
    {
        $createdPayment = new CreatedPayment('1234asdf', 'http://localhost/payment');

        $this->assertInstanceOf('HeliosHpp\\Model\\CreatedPayment', $createdPayment);

        return $createdPayment;
    }
}
