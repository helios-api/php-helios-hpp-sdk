<?php

namespace HeliosHpp\Service;

use GuzzleHttp\Psr7\Response;
use HeliosHpp\Component\Request;
use HeliosHpp\Exception\HeliosHppException;
use HeliosHpp\Exception\PaymentBodyException;
use HeliosHpp\Model\CreatedPayment;
use HeliosHpp\Model\Payment;

/**
 * Class PaymentService
 *
 * @TODO    handle Helios errors when ready
 *
 * @package HeliosHpp\Service
 */
class PaymentService implements PaymentServiceInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * PaymentService constructor.
     *
     * @param $url
     */
    public function __construct($url)
    {
        if(!is_string($url)) {
            throw new HeliosHppException('The "url" must be provided.');
        }
        $this->url = $url;
    }

    /**
     * @param \HeliosHpp\Model\Payment $payment
     *
     * @return \HeliosHpp\Model\CreatedPayment
     * @throws \HeliosHpp\Exception\HeliosHppException
     * @throws \HeliosHpp\Exception\PaymentBodyException
     */
    public function create(Payment $payment)
    {
        $request = new Request($this->url);
        $request
            ->setMethod('POST')
            ->setEndpoint('/payments')
            ->setPayload($payment->toJson());

        $response = $request->send();
        return $this->checkResponse($response);
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return CreatedPayment
     * @throws \HeliosHpp\Exception\PaymentBodyException
     */
    private function checkResponse(Response $response)
    {
        try {
            $jsonBody = $response->getBody()->getContents();
            return $this->createResponseObject($jsonBody);
        } catch(\InvalidArgumentException $exception) {
            throw new PaymentBodyException("Wrong response body! {$exception->getMessage()}");
        }
    }

    /**
     * @param string $json
     *
     * @return CreatedPayment
     */
    private function createResponseObject($json)
    {
        $createdPayment = new CreatedPayment();
        return $createdPayment->fromJson($json);
    }
}