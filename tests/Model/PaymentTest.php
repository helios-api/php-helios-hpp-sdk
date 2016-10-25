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
        $url = new Url('cancelUrl', 'completeUrl', 'callbackUrl');

        $payment = new Payment(
            'accountId',
            'USD',
            100,
            'reference',
            $url
        );

        $this->assertInstanceOf('HeliosHpp\\Model\\Payment', $payment);

        return $payment;
    }

    /**
     * @covers \HeliosHpp\Model\Payment::__construct
     */
    public function testObjectCanBeConstructedWithValidParameters()
    {
        $url = new Url('cancelUrl', 'completeUrl', 'callbackUrl');
        $customer = new Customer();

        $payment = new Payment(
            'accountId',
            'USD',
            100,
            'reference',
            $url,
            1234567890,
            'signature',
            'amountShipping',
            'amountTax',
            'shopCountry',
            'shopName',
            'transactionType',
            'test',
            'description',
            $customer
        );

        $this->assertInstanceOf('HeliosHpp\\Model\\Payment', $payment);

        return $payment;
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getAccountId
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testAccountIdCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals("accountId", $payment->getAccountId());
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
     * @covers \HeliosHpp\Model\Payment::getReference
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testReferenceCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals('reference', $payment->getReference());
    }

    /**
     * @covers \HeliosHpp\Model\Payment::getTimestamp
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testTimestampCanBeRetrieved(Payment $payment)
    {
        $this->assertEquals(1234567890, $payment->getTimestamp());
    }

    /**
     * @covers  \Model\BoardingCard::getReference
     * @depends testObjectCanBeConstructedWithValidParameters
     */
    public function testTimestampCanBeSet(Payment $payment)
    {
        $currentTime = time();
        $output = $payment->setTimestamp($currentTime);

        $this->assertEquals($output, $payment);
        $this->assertEquals($currentTime, $payment->getTimestamp());
    }
}
