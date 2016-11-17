<?php
date_default_timezone_set('Europe/Warsaw');
require_once __DIR__ . '/../vendor/autoload.php';

//$heliosApp = new \HeliosHpp\HeliosHpp(['accountId' => '{account-id}', 'url' => '{helios-hpp-url}']);
//$payment = new \HeliosHpp\Model\Payment('{account-id}', 'USD', 1000);

//try {
//    $createdPayment = $heliosApp->createPayment($payment);
//} catch (\HeliosHpp\Exception\HeliosHppException $exception) {
//    // When Helios HPP returns an error
//    echo 'Helios HPP returned an error: ' . $exception->getMessage();
//    exit;
//} catch (\HeliosHpp\Exception\PaymentBodyException $exception) {
//    // When Helios HPP returns invalid response
//    echo 'Helios HPP returned invalid response: ' . $exception->getMessage();
//    exit;
//}
//
//$heliosApp = new \HeliosHpp\HeliosHpp(['accountId' => '{account-id}', 'url' => '{helios-hpp-url}']);
//$paymentStatusChange = $heliosApp->registerWebHook();
//
//$createdPayment->getToken();
//
//$heliosApp = new \HeliosHpp\HeliosHpp(['accountId' => '{account-id}', 'url' => '{helios-hpp-url}']);
//
//try {
//    $paymentStatusChange = $heliosApp->registerWebHook();
//} catch (\HeliosHpp\Exception\WebHookRequestException $exception) {
//    // When Helios HPP call or payload is invalid
//    echo 'Helios HPP called with invalid request: ' . $exception->getMessage();
//    exit;
//}
//
//$paymentStatusChange->getEventType();
