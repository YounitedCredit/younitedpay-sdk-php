# Younited Pay SDK for PHP


This package is a Younited Pay PHP SDK. It let you mange exchange between your shop and Younited Pay.

This package is a dependancy of Younited Credit PrestaShop or Magento plugin.


## Versions scope

This package is compatible with PHP 5.6+.

## How to install it ?

Todo: Composer via packagist

## How to try this SDK ?

[Technical documentation][younitedpay-doc] 

You can easily get list of offer by creating a request

```php
require 'vendor/autoload.php';

use Tot\YounitedPaySDK\Client;
use Tot\YounitedPaySDK\Request\BestPriceRequest;
use Tot\YounitedPaySDK\Model\BestPrice;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';
$tenantId = 'younited-tenant-id';


$body = new BestPrice();
$body->setBorrowedAmount(149);

$request = (new BestPriceRequest())
    ->enableSanbox()
    ->setModel($body);

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret, $tenantId)
        ->sendRequest($request);
    if ($response->getStatusCode() === 200) {
        var_dump($response->getModel());
    }
    //var_dump((string) $request->getUri());
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```






[younitedpay-doc]: https://api.younited-pay.com/