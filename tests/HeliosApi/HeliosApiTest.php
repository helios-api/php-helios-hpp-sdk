<?php

namespace HeliosApi\Tests;

use HeliosApi\Exception\HeliosApiException;
use HeliosApi\HeliosApi;
use HeliosApi\Model\BankAccount;
use HeliosApi\Model\BillingAddress;
use HeliosApi\Model\Charge\CreditCardCharge;
use HeliosApi\Model\Charge\ElvCharge;
use HeliosApi\Model\Charge\EpsCharge;
use HeliosApi\Model\Charge\GiroCharge;
use HeliosApi\Model\Charge\IdealCharge;
use HeliosApi\Model\Charge\SepaCharge;
use HeliosApi\Model\Charge\SofortCharge;
use HeliosApi\Model\CreditCard;
use HeliosApi\Model\CustomerInfo;
use HeliosApi\Model\Ideal;
use HeliosApi\Model\Sepa;
use PHPUnit\Framework\TestCase;

class HeliosApiTest extends TestCase
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

        if(!strlen(HeliosApiTestCredentials::$accountId)
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
     * @covers \HeliosApi\HeliosApi::__construct
     */
    public function testObjectCanBeConstructed()
    {
        $config = array(
            'accountId'  => self::$accountId,
            'url'        => self::$url,
            'baseUrl'    => HeliosApi::API_BASE_URL,
            'apiVersion' => HeliosApi::API_VERSION
        );
        $heliosApi = new HeliosApi($config);

        $this->assertInstanceOf('HeliosApi\\HeliosApi', $heliosApi);

        return $heliosApi;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::getPaymentList
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testPaymentListCanBeFetched(HeliosApi $heliosApi)
    {
        $paymentList = $heliosApi->getPaymentList();

        $this->assertInternalType('array', $paymentList);
        $this->assertContainsOnlyInstancesOf('HeliosApi\Model\Payment', $paymentList);
        $this->assertGreaterThan(0, count($paymentList));

        return $paymentList;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::getPaymentList
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testChannelsCanBeFetched(HeliosApi $heliosApi)
    {
        $channelList = $heliosApi->getChannelList();

        $this->assertInternalType('array', $channelList);
        $this->assertContainsOnlyInstancesOf('HeliosApi\Model\Channel', $channelList);
        $this->assertGreaterThan(0, count($channelList));

        return $channelList;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::authorizeCreditCard
     * @dataProvider creditCardChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testCreditCardAuthorizationCanBePerformed(CreditCardCharge $cardCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->authorizeCreditCard($cardCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::authorizeCreditCard3dSecure
     * @dataProvider creditCardChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testCreditCard3dSecureAuthorizationCanBePerformed(CreditCardCharge $cardCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->authorizeCreditCard3dSecure($cardCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeCreditCard
     * @dataProvider creditCardChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testCreditCardChargeCanBePerformed(CreditCardCharge $cardCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->chargeCreditCard($cardCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeCreditCard3dSecure
     * @dataProvider creditCardChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testCreditCard3dSecureChargeCanBePerformed(CreditCardCharge $cardCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->chargeCreditCard3dSecure($cardCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());
        $this->assertNotEmpty($payment->getRedirectUrl());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeSepa
     * @dataProvider sepaChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testSepaChargeCanBePerformed(SepaCharge $sepaCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->chargeSepa($sepaCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeElv
     * @dataProvider elvChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testElvChargeCanBePerformed(ElvCharge $elvCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->chargeElv($elvCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeEps
     * @dataProvider epsChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testEpsChargeCanBePerformed(EpsCharge $epsCharge, HeliosApi $heliosApi)
    {
//        $this->expectException();

        $this->expectExceptionCode(0);

        $payment = $heliosApi->chargeEps($epsCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeSofort
     * @dataProvider sofortChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testSofortChargeCanBePerformed(SofortCharge $sofortCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->chargeSofort($sofortCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @covers       \HeliosApi\HeliosApi::chargeGiro
     * @dataProvider giroChargeProvider
     * @group        internet
     * @depends      testObjectCanBeConstructed
     */
    public function testGiroChargeCanBePerformed(GiroCharge $giroCharge, HeliosApi $heliosApi)
    {
        $payment = $heliosApi->chargeGiro($giroCharge);

        $this->assertInstanceOf('HeliosApi\Model\Payment', $payment);
        $this->assertInstanceOf('HeliosApi\Model\BillingAddress', $payment->getBillingAddress());
        $this->assertInstanceOf('HeliosApi\Model\CustomerInfo', $payment->getCustomerInfo());
        $this->assertInstanceOf('HeliosApi\Model\BillingData', $payment->getBillingData());

        return $payment;
    }

    /**
     * @return array
     */
    public function creditCardChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");
        $creditCard = new CreditCard("4200000000000000", "Manfred Muster", "147", 2022, 7);

        $creditCardCharge = new CreditCardCharge();
        $creditCardCharge
            ->setCreditCard($creditCard)
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress);
        return [
            [$creditCardCharge]
        ];
    }

    /**
     * @return array
     */
    public function sepaChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");
        $sepa = new Sepa("DE89370400440532013000", "DABAIE2D");

        $sepaCharge = new SepaCharge();
        $sepaCharge
            ->setSepa($sepa)
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress)
            ->setDescriptor("Order 123");
        return [
            [$sepaCharge]
        ];
    }

    /**
     * @return array
     */
    public function elvChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");
        $bankAccount = new BankAccount("Manfred Muster", "1234567899", "10050000");

        $elvCharge = new ElvCharge();
        $elvCharge
            ->setBankAccount($bankAccount)
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress);
        return [
            [$elvCharge]
        ];
    }

    /**
     * @return array
     */
    public function epsChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");

        $epsCharge = new EpsCharge();
        $epsCharge
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress);
        return [
            [$epsCharge]
        ];
    }

    /**
     * @return array
     */
    public function sofortChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");

        $sofortCharge = new SofortCharge();
        $sofortCharge
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress)
            ->setDescriptor("Order 123");
        return [
            [$sofortCharge]
        ];
    }

    /**
     * @return array
     */
    public function giroChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");

        $giroCharge = new GiroCharge();
        $giroCharge
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress);
        return [
            [$giroCharge]
        ];
    }

    /**
     * @return array
     */
    public function idealChargeProvider()
    {
        $customerInfo = new CustomerInfo("1.1.1.1", "manfred@example.com", "Manfred", "Man");
        $billingAddress = new BillingAddress("Manfred", "Testing", "Test str. 1", null, "12345", "Berlin", null, "DE");
        $ideal = new Ideal("NL18ABNA0484869868", "INGBNL2A");

        $idealCharge = new IdealCharge();
        $idealCharge
            ->setBankAccount($ideal)
            ->setAmount(889873)
            ->setCurrency("EUR")
            ->setCustomerInfo($customerInfo)
            ->setBillingAddress($billingAddress);
        return [
            [$idealCharge]
        ];
    }
}
