<?php

namespace HeliosHpp\Service;

use HeliosHpp\Exception\HeliosHppException;
use HeliosHpp\Model\Payment;
use HeliosHpp\Tests\HeliosHppTestCredentials;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentServiceTest
 *
 * @TODO implement Helios HPP test suite
 *
 * @package HeliosHpp\Service
 */
class PaymentServiceTest extends TestCase
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
        if (!file_exists(__DIR__ . '/../HeliosHppTestCredentials.php')) {
            throw new HeliosHppException(
                'You must create a HeliosHppCredentials.php file from HeliosHppTestCredentials.php.dist'
            );
        }

        if (!strlen(HeliosHppTestCredentials::$accountId) ||
            !strlen(HeliosHppTestCredentials::$url)
        ) {
            throw new HeliosHppException(
                'You must fill out HeliosHppCredentials.php'
            );
        }
        static::$accountId = HeliosHppTestCredentials::$accountId;
        static::$url = HeliosHppTestCredentials::$url;
    }

    /**
     * @covers \HeliosHpp\Service\PaymentService::__construct
     */
    public function testObjectCanBeConstructed()
    {
        $paymentService = new PaymentService(self::$url);

        $this->assertInstanceOf('HeliosHpp\\Service\\PaymentService', $paymentService);

        return $paymentService;
    }

    /**
     * @covers       \HeliosHpp\Service\PaymentService::create
     * @group        internet
     * @dataProvider validPaymentProvider
     * @depends      testObjectCanBeConstructed
     */
    public function testPaymentCanBeCreated(Payment $payment, PaymentService $paymentService)
    {
        $payment->setAccountId(self::$accountId);
        $createdPayment = $paymentService->create($payment);

        $this->assertInstanceOf('HeliosHpp\\Model\\CreatedPayment', $createdPayment);
        $this->assertNotEmpty($createdPayment->getToken());
        $this->assertInternalType("string", $createdPayment->getToken());

        return $createdPayment;
    }

    /**
     * @covers       \HeliosHpp\Service\PaymentService::create
     * @group        internet
     * @dataProvider invalidPaymentProvider
     * @depends      testObjectCanBeConstructed
     */
    public function testPaymentCannotBeCreated(Payment $payment, PaymentService $paymentService)
    {
        $this->expectException(HeliosHppException::class);
        $paymentService->create($payment);
    }

    /**
     * @return array
     */
    public function urlProvider()
    {
        return [
            [self::$url]
        ];
    }

    /**
     * @return array
     */
    public function validPaymentProvider()
    {
        return [
            [
                new Payment(
                    '',
                    'EUR',
                    '2000'
                )
            ]
        ];
    }

    /**
     * @return array
     */
    public function invalidPaymentProvider()
    {
        return [
            [
                new Payment(
                    '138fee28-c6f3-4595-9df2-157c5b440a0e:3dW7pdYkppMc@GFqKGgsGmFaTxYuSP40OWPiGHJPBwA',
                    'USD',
                    '100'
                )
            ],
        ];
    }
}