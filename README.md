# Helios Hosted Payment Page SDK for PHP

## NOTICE: This branch is under active development.

[![Build Status](https://img.shields.io/travis/helios-api/php-helios-hpp-sdk/master.svg)](https://travis-ci.org/helios-api/php-helios-hpp-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/helios-api/php-helios-hpp-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/helios-api/php-helios-hpp-sdk/?branch=master)


This repository contains the open source PHP SDK that allows you to access the Helios HPP from your PHP app. Documentation fo Helios API  [documentation.dp.ag](http://documentation.dp.ag).


## Installation

The Helios HPP PHP SDK can be installed with [Composer](https://getcomposer.org/). Run this command:

```sh
composer require helios/helios-hpp-sdk
```


## Usage

> **Note:** This version of the Helios HPP SDK for PHP requires PHP 5.6 or greater.

Simple transaction registration example.

```php
$heliosApp = new \HeliosHpp\HeliosHpp(['accountId' => '{account-id}', 'url' => '{helios-hpp-url}']);
$payment = new \HeliosHpp\Model\Payment('{account-id}', 'USD', 1000);

try {
    $createdPayment = $heliosApp->createPayment($payment);
} catch(\HeliosHpp\Exception\HeliosHppException $exception) {
    // When Helios HPP returns an error
    echo 'Helios HPP returned an error: ' . $exception->getMessage();
    exit;
} catch(\HeliosHpp\Exception\PaymentBodyException $exception) {
    // When Helios HPP returns invalid response
    echo 'Helios HPP returned invalid response: ' . $exception->getMessage();
    exit;
}

echo 'Payment Token ' . $createdPayment->getToken() 
```

WebHook registration.

```php
$heliosApp = new \HeliosHpp\HeliosHpp(['accountId' => '{account-id}', 'url' => '{helios-hpp-url}']);

try {
    $paymentStatusChange = $heliosApp->registerWebHook();
} catch(\HeliosHpp\Exception\WebHookRequestException $exception) {
    // When Helios HPP call or payload is invalid
    echo 'Helios HPP called with invalid request: ' . $exception->getMessage();
    exit;
}

echo 'Payment Status event type' . $paymentStatusChange->getEventType(); 
```

## Tests

1. [Composer](https://getcomposer.org/) is a prerequisite for running the tests. Install composer globally, then run `composer install` to install required files.
3. The tests can be executed by running this command from the root directory:

```bash
$ ./vendor/bin/phpunit
```

By default the tests will send live HTTP requests to the Helios HPP server. If you are without an internet connection you can skip these tests by excluding the `internet` group.

```bash
$ ./vendor/bin/phpunit --exclude-group internet
```

## License

Please see the [license file](https://github.com/helios-api/php-helios-hpp-sdk/blob/master/LICENSE) for more information.
