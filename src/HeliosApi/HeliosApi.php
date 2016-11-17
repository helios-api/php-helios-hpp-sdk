<?php

namespace HeliosApi;

use Doctrine\Common\Annotations\AnnotationRegistry;
use HeliosApi\Model\Charge\CreditCardCharge;
use HeliosApi\Model\Charge\ElvCharge;
use HeliosApi\Model\Charge\EpsCharge;
use HeliosApi\Model\Charge\GiroCharge;
use HeliosApi\Model\Charge\SepaCharge;
use HeliosApi\Model\Charge\SofortCharge;

/**
 * Class HeliosApi
 *
 * @package HeliosHpp
 */
class HeliosApi
{
    /**
     * @const string Version number of the Helios PHP SDK.
     */
    const VERSION = '0.0.1-dev';

    /**
     * @const string Helios Account ID
     */
    const APP_ACCOUNT_ID = 'APP_ACCOUNT_ID';

    /**
     * @const string Helios API URL
     */
    const APP_API_URL = 'APP_APP_URL';

    /**
     * @const string Helios API version
     */
    const API_VERSION = '';

    /**
     * @const string Helios API base path
     */
    const API_BASE_URL = '';

    /**
     * @var HeliosApiApp
     */
    protected $heliosApiApp;

    /**
     * HeliosHpp constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config = array_merge(
            [
                'accountId' => getenv(static::APP_ACCOUNT_ID),
                'url' => getenv(static::APP_API_URL),
                'baseUrl' => getenv(static::API_BASE_URL),
                'apiVersion' => getenv(static::API_VERSION)
            ],
            $config
        );

        $this->heliosApiApp = new HeliosApiApp(
            $config['accountId'],
            $config['url'],
            $config['baseUrl'],
            $config['apiVersion']
        );

        AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', __DIR__ . "/../../vendor/jms/serializer/src");
        AnnotationRegistry::registerLoader('class_exists');
    }

    /**
     * @return \HeliosApi\Model\Payment[]
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function getPaymentList()
    {
        /** @var \HeliosApi\Service\PaymentService $paymentService */
        $paymentService = $this->heliosApiApp->getApiService('payment');
        $paymentList = $paymentService->getList();
        return $paymentList;
    }

    /**
     * @return \HeliosApi\Model\Channel[]
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function getChannelList()
    {
        /** @var \HeliosApi\Service\ChannelService $channelService */
        $channelService = $this->heliosApiApp->getApiService('channel');
        $channelList = $channelService->getList();
        return $channelList;
    }

    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $cardCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function authorizeCreditCard(CreditCardCharge $cardCharge)
    {
        /** @var \HeliosApi\Service\Payments\Authorize\CreditCardService $creditCardService */
        $creditCardService = $this->heliosApiApp->getApiService('payments.authorize.credit_card');
        return $creditCardService->authorize($cardCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $cardCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function authorizeCreditCard3dSecure(CreditCardCharge $cardCharge)
    {
        /** @var \HeliosApi\Service\Payments\Authorize\CreditCardService $creditCardService */
        $creditCardService = $this->heliosApiApp->getApiService('payments.authorize.credit_card_3d_secure');
        return $creditCardService->authorize($cardCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $cardCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeCreditCard(CreditCardCharge $cardCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\CreditCardService $creditCardService */
        $creditCardService = $this->heliosApiApp->getApiService('payments.charge.credit_card');
        return $creditCardService->charge($cardCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\CreditCardCharge $cardCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeCreditCard3dSecure(CreditCardCharge $cardCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\CreditCard3dSecureService $creditCard3dSecureService */
        $creditCard3dSecureService = $this->heliosApiApp->getApiService('payments.charge.credit_card_3d_secure');
        return $creditCard3dSecureService->charge($cardCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\SepaCharge $sepaCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeSepa(SepaCharge $sepaCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\SepaService $sepaService */
        $sepaService = $this->heliosApiApp->getApiService('payments.charge.sepa');
        return $sepaService->charge($sepaCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\ElvCharge $elvCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeElv(ElvCharge $elvCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\ElvService $elvService */
        $elvService = $this->heliosApiApp->getApiService('payments.charge.elv');
        return $elvService->charge($elvCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\EpsCharge $epsCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeEps(EpsCharge $epsCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\EpsService $epsService */
        $epsService = $this->heliosApiApp->getApiService('payments.charge.eps');
        return $epsService->charge($epsCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\SofortCharge $sofortCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeSofort(SofortCharge $sofortCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\SofortService $sofortService */
        $sofortService = $this->heliosApiApp->getApiService('payments.charge.sofort');
        return $sofortService->charge($sofortCharge);
    }

    /**
     * @param \HeliosApi\Model\Charge\GiroCharge $giroCharge
     *
     * @return \HeliosApi\Model\Payment
     * @throws \HeliosApi\Exception\HeliosApiException
     */
    public function chargeGiro(GiroCharge $giroCharge)
    {
        /** @var \HeliosApi\Service\Payments\Charge\GiroService $giroService */
        $giroService = $this->heliosApiApp->getApiService('payments.charge.giro');
        return $giroService->charge($giroCharge);
    }
}
