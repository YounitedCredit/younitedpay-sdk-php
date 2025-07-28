# Younited Pay SDK for PHP


[![Coding Standart](https://github.com/YounitedCredit/younitedpay-sdk-php/actions/workflows/main.yml/badge.svg?branch=master)](https://github.com/YounitedCredit/younitedpay-sdk-php/actions/workflows/main.yml) [![Unit test](https://github.com/YounitedCredit/younitedpay-sdk-php/actions/workflows/phpunit.yml/badge.svg?branch=master)](https://github.com/YounitedCredit/younitedpay-sdk-php/actions/workflows/phpunit.yml)

This package is a Younited Pay PHP SDK. It let you mange exchange between your shop and Younited Pay.

This package is a dependancy of Younited Credit PrestaShop or Magento plugin.


## Versions scope

This package is compatible with PHP 5.6+.
| PHP Version | SDK Version |
| :---------: | :---------: |
| PHP 5.6 to PHP 8.0 (not included) | v1.X
| PHP 8.0+ | v2.X 
| PHP 5.6+ to PHP8+ | v3.X 

## How to install it ?

Todo: Composer via packagist


To use this package with php 5.6 or in production mode, please install this dependancy with :
```
composer update --ignore-platform-reqs --no-dev
```

in a eveloppement environment
```
composer update
```

## Recommandations

You can see one example of use of this SDK here : https://github.com/YounitedCredit/younitedpay-module-prestashop
Each application should consider several points :

* Security  
You have an example of how should be check a payment on an application.
We should not trust requests (even verified webhooks) and make an API call to check if payment is done
and if the amount paid is the right one related to the order we have to place.

* Performance  
Application must implement cache to avoid making the same requests and get token each call.  
Token expire each hour, offers every days.

## How to try this SDK ?

First of all, you will need to create your account and get credentials from Younited Pay. 
Then you can use them to retrieve your shop codes and begin the adventure !

### Get shop codes for one merchant

[Shop Codes documentation][get-merchant-doc]

This is usefull for merchants with several point of sales and mandatory for creating payments.
In previous API there was a fallback to get the "ONLINE" one if found by default for the merchant.
Please be carefull and prefer to let merchants save this configuration to make API calls.

```php

require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Request\NewAPI\ShopsRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$request = new ShopsRequest();
// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    $shopCodes = $response->getModel();

    $shopCodesNames = [];
    foreach ($shopCodes as $oneShopCode) {
        if (isset($oneShopCode['name']) && isset($oneShopCode['code'])) {
            $shopCodesNames[] = [
                'name' => $oneShopCode['name'],
                'code' => $oneShopCode['code'],
            ];
        }
    }
    echo 'Shop codes name and code only:<br />';
    var_dump($shopCodesNames);
    echo '</pre>';
}
```

Please note that this is the code which is needed (not the name ) !

### Get Younited Pay eligible offers, per maturities

[Get Offers documentation][getoffers-doc]

You can easily get list of offer by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Model\NewAPI\GetOffers;
use YounitedPaySDK\Request\NewAPI\GetOffersRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$body = (new GetOffers())
        ->setShopCode('ONLINE-SHOP-CODE') // New in v3 - shop code needed - see Shop Codes documentation
        ->setAmount(149.0);

// First possibility: we want only a list of maturities (no range needed)
$body->setMaturityList('24,36');

// Other possitiliby: we want a range (eg: from 24 to 36)
$body->setMaturityRangeStep(1)
     ->setMaturityRangeMin(24)
     ->setMaturityRangeMax(36);

$request = (new GetOffersRequest())->setModel($body);

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Get Available Maturities

[Get Offers documentation - Get only maturities][maturities-doc]

You can easily get available maturities by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Model\NewAPI\GetOffers;
use YounitedPaySDK\Request\NewAPI\GetOffersRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

// Important note - in v3.0 available maturities request disapear - we use range offers to get them
// We use from 1 to 84 to get every available, feel free to adapt your needs
$body = (new GetOffers())
    ->setShopCode('ONLINE-SHOP-CODE') // New in v3 - shop code needed - see Shop Codes documentation
    ->setAmount(1499.0)
    ->setMaturityRangeStep(1) //
    ->setMaturityRangeMin(1)
    ->setMaturityRangeMax(84);

$request = (new GetOffersRequest())->setModel($body);

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    $maturityList = [];
    foreach ($response->getModel() as $oneOffer) {
        if (in_array((int) $oneOffer->getMaturityInMonths(), $maturityList) === false) {
            $maturityList[] = (int) $oneOffer->getMaturityInMonths();
        }
    }
    // Sort maturities - min to max
    usort($validOffers, function ($a, $b) {
        return $a > $b ? 1 : -1;
    });
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Create a payment

[Create a payment documentation][create-payment-doc] 

You can easily initialize a contract by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Adapter\CreatePaymentAdapter;
use YounitedPaySDK\Model\Address;
use YounitedPaySDK\Model\Basket;
use YounitedPaySDK\Model\BasketItem;
use YounitedPaySDK\Model\InitializeContract;
use YounitedPaySDK\Model\MerchantOrderContext;
use YounitedPaySDK\Model\MerchantUrls;
use YounitedPaySDK\Model\NewAPI\CustomExperience;
use YounitedPaySDK\Model\NewAPI\Request\GetPayment;
use YounitedPaySDK\Model\NewAPI\TechnicalInformation;
use YounitedPaySDK\Model\PersonalInformation;
use YounitedPaySDK\Request\InitializeContractRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$datetime = new \DateTime('1970-01-01T00:00:00');

$address = (new Address())
    ->setStreetNumber('123')
    ->setStreetName('StreetName') // 32 caracs max
    ->setAdditionalAddress('') // 32 caracs max
    ->setCity('Country')
    ->setPostalCode('12345')
    ->setCountryCode('FR');

$personalInformation = (new PersonalInformation())
    ->setFirstName('FirstName')
    ->setLastName('LastName')
    ->setGenderCode('MALE')
    ->setEmailAddress('firstname.lastname@mail.com')
    ->setCellPhoneNumber('+33611223344') // Send null if format number is not good (not internationnal or empty)
    ->setBirthDate($datetime) // Warning - must be a valide date see documentation
    ->setAddress($address);
     
$basketItem1 = (new BasketItem())
    ->setItemName('Item basket 1')
    ->setQuantity(2)
    ->setUnitPrice(45.0);

$basketItem2 = (new BasketItem())
    ->setItemName('Item basket 2')
    ->setQuantity(1)
    ->setUnitPrice(33.0);

$basket = (new Basket())
    ->setBasketAmount(123.0)
    ->setItems([$basketItem1, $basketItem2]);
    
$merchantUrls = (new MerchantUrls())
    ->setOnApplicationFailedRedirectUrl('on-application-failed-redirect-url.com')
    ->setOnApplicationSucceededRedirectUrl('on-application-succeeded-redirect-url.com')
    ->setOnCanceledWebhookUrl('on-canceled-webhook-url.com')
    ->setOnWithdrawnWebhookUrl('on-withdrawn-webhook-url.com');
    
$merchantOrderContext = (new MerchantOrderContext())
    ->setChannel('test')
    ->setShopCode('TEST')
    ->setMerchantReference('MerchantReference')
    ->setAgentEmailAddress('merchant@mail.com');
    
$body = (new InitializeContract())
    ->setRequestedMaturity(10)
    ->setPersonalInformation($personalInformation)
    ->setBasket($basket)
    ->setMerchantUrls($merchantUrls)
    ->setMerchantOrderContext($merchantOrderContext);

$oldRequest = (new InitializeContractRequest())->setModel($body);

// Convert "Old" API calls for new API
// This converter allow you to keep previous code and adapt to your need with new API
$newWebhookUrl = 'new-webhook-url-for-new-api';
$newRedirectUrl = 'new-redirect-url-for-new-api';
// Have new controllers for new URL is recommanded. Only one URL is accepted now for success, cancel and other cases.
// Concerning webhooks, please note that old webhooks will be sent if a contract was done with "old" API.
// So you should keep both use cases. Please note too that webhook format has changes (see end documentation on this point)

$technicalInformation = (new TechnicalInformation())
    ->setWebhookNotificationUrl($webhookUrl)
    ->setApiVersion('2025-01-01'); // See https://docs.younited.com/pay - API Version list and new Request objects

$customExperience = (new CustomExperience())
    ->setCustomerRedirectUrl($redirectUrl);

$request = (new CreatePaymentAdapter())
    ->setShopCode('ONLINE-SHOP-CODE') // New in v3 - shop code needed - see Shop Codes documentation
    ->setTechnicalInformation($technicalInformation)
    ->setCustomExperience($customExperience)
    ->convertInitializeContract($oldRequest);

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Load Contract

[Get a payment documentation][get-payment-doc]

You can easily load a payment information by creating a request.
Please not that now we retrieve the paymentId from contract creation and use it for each calls (instead of contract reference)

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Model\NewAPI\GetPayment;
use YounitedPaySDK\Request\NewAPI\GetPaymentRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$getPaymentRequestModel = (new GetPayment())->setId('payment-id');
$request = (new GetPaymentRequest())->setModel($getPaymentRequestModel);

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Confirm Contract (depracated)

It will not be needed anymore to confirm a payment as it was for a contract.
More details on migration guide here : https://docs.younited.com/pay/migration.html

### Activate Contract

[Execute a payment documentation][execute-payment-doc]

You can easily execute a payment by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Model\NewAPI\Request\ExecutePayment;
use YounitedPaySDK\Request\NewAPI\ExecutePaymentRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$body = (new ExecutePayment())->setId('payment-id');

$request = new ExecutePaymentRequest();

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Withdraw Contract

[Refund a payment documentation][refund-payment-doc]

You can easily refund a payment (totally or partially) by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Request\NewAPI\RefundPaymentRequest;
use YounitedPaySDK\Model\NewAPI\Request\RefundPayment;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$body = (new RefundPayment())
        ->setPaymentId('payment-id')
        ->setAmount((float) round(150, 2)) // Amount to withdrawn float
        ->setIdempotencyKey('your-idempotency-key');

$request = new RefundPaymentRequest();

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)
        ->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Cancel Contract

[Cancel a payment documentation][cancel-payment-doc]

You can easily cancel a payment by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Model\NewAPI\Request\CancelPayment;
use YounitedPaySDK\Request\NewAPI\CancelPaymentRequest;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';

$body = (new CancelPayment())
        ->setId($younitedContract->payment_id);

$request = new CancelPaymentRequest();

// If we want to set sandbox mode (different credentials than production)
$request = $request->enableSandbox();

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)
        ->sendRequest($request);
    echo '<pre>';
    echo 'Status Code:<br />';
    var_dump($response->getStatusCode());
    echo '<br />Reason phrase (for statut code or error):<br />';
    var_dump($response->getReasonPhrase());
    echo 'Response:<br />';
    var_dump($response->getModel());
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Get Callback Response to configure Webhook

[WebHook client to secure response documentation][webhook-doc]

You can easily get available maturities by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Webhook\Webhook;
    
try {
    $webhook = new Webhook('your-webhook-secret');

    echo '<pre>';
    if ($webhook->getErrorResponse() !== false) {
        // The response is not good - we get the reason here
        $error = $webhook->getErrorResponse();
        echo 'Webhook error response :<br />' . $error;
        /** Coul be one of :
         * 400 - Unable to decode content
         * it seems response is not well formatted
         * 
         * 401 - No Signature or Datetime header
         * No headers on request (X-YOUNITED-DATETIME or X-YOUNITED-HMACSHA256-SIGNATURE)
         * 
         * 401 - Signature or Datetime header empty
         * headers are present but at least one is empty (X-YOUNITED-DATETIME or X-YOUNITED-HMACSHA256-SIGNATURE)
         * 
         * 401 - Hash not accepted.
         * This means that your webhook secret do not give the same results that younited made - in most of cases error on secret
         */
    } else {
        // No error and webhook payload is well decoded and secure
        // For order creation you should anyway make a call to the API to check amount and status
        $webhookNotification = $webhook->getEventNotification();
        echo 'Webhook payload:<br />';
        var_dump($webhookNotification->jsonSerialize());
        echo 'Webhook type of notification,:<br />';
        echo $webhookNotification->getType();
        // Do webhook process and refund, cancel or update payment if needed
    }
    echo '</pre>';
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

[get-merchant-doc]: https://docs.younited.com/pay/#tag/shops/GET/shops
[getoffers-doc]: https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
[maturities-doc]: https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
[get-payment-doc]: https://docs.younited.com/pay/#tag/payments/GET/payments/{id}
[create-payment-doc]: https://docs.younited.com/pay/#tag/payments/POST/payments/personal-loan
[execute-payment-doc]: https://docs.younited.com/pay/#tag/payments/POST/payments/{id}/execute
[refund-payment-doc]: https://docs.younited.com/pay/#tag/refunds/POST/refunds
[cancel-payment-doc]: https://docs.younited.com/pay/#tag/payments/POST/payments/{id}/cancel
[webhook-doc]: https://docs.younited.com/pay/#tag/webhooks
