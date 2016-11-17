<?php

namespace HeliosHpp\Model;

use PHPUnit\Framework\TestCase;

/**
 * Class PaymentTest
 *
 * @package HeliosHpp\Model
 */
class PaymentTest extends TestCase
{
    /**
     * @covers \HeliosHpp\Model\Payment::__construct
     */
    public function testObjectCanBeConstructedWithMinimumParameters()
    {
        $payment = new Payment();

        $this->assertInstanceOf('HeliosHpp\\Model\\Payment', $payment);

        return $payment;
    }

    /**
     * @covers \HeliosHpp\Model\Payment::__construct
     */
    public function testObjectCanBeConstructedWithValidParameters()
    {
        $billingInfo = new BillingInfo('John', 'Doe', null, 'Example Av. 3', null, 'London', null, 'E10AA', 'GB');

        $payment = new Payment(
            'USD',
            100,
            'joe.doe@example.com',
            md5('123'),
            'statement',
            $billingInfo
        );

        $this->assertInstanceOf('HeliosHpp\\Model\\Payment', $payment);

        return $payment;
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getCurrency
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testCurrencyCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals("USD", $payment->getCurrency());
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getAmount
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testAmountCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals(100, $payment->getAmount());
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getCustomerEmail
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testCustomerEmailCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals('joe.doe@example.com', $payment->getCustomerEmail());
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getTransactionId
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testTransactionIdCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals(md5('123'), $payment->getTransactionId());
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getStatementName
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testStatementNameCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals('statement', $payment->getStatementName());
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getBillingInfo
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testBillingInfoCanBeRetrieved(Payment $payment)
    {
        $this->assertInstanceOf('HeliosHpp\Model\BillingInfo', $payment->getBillingInfo());
    }
}
