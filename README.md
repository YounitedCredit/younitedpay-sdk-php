# Younited Pay SDK for PHP


[![Coding Standart](https://github.com/202ecommerce/younitedpaysdk/actions/workflows/main.yml/badge.svg)](https://github.com/202ecommerce/younitedpaysdk/actions/workflows/main.yml) [![Coding Standart](https://github.com/202ecommerce/younitedpaysdk/actions/workflows/main.yml/badge.svg)](https://github.com/202ecommerce/younitedpaysdk/actions/workflows/main.yml) 

This package is a Younited Pay PHP SDK. It let you mange exchange between your shop and Younited Pay.

This package is a dependancy of Younited Credit PrestaShop or Magento plugin.


## Versions scope

This package is compatible with PHP 5.6+.

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

## How to try this SDK ?

### Get Younited Pay eligible offers, per maturities

[Best Price documentation][bestprice-doc] 

You can easily get list of offer by creating a request

```php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Request\BestPriceRequest;
use YounitedPaySDK\Model\BestPrice;

$clientId = 'your-client-id';
$clientSecret = 'your-secret-idtoken';


$body = new BestPrice();
$body->setBorrowedAmount(149);

$request = (new BestPriceRequest())
    ->enableSanbox()
    ->setModel($body);

$client = new Client();
try {
    $response = $client->setCredential($clientId, $clientSecret)
        ->sendRequest($request);
    if ($response->getStatusCode() === 200) {
        var_dump($response->getModel());
    }
} catch (Exception $e) {
    echo ($e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString());
}
```

### Initialize a contract

[Initialize a contract documentation][initialize-doc] 




## Quality 


[bestprice-doc]: https://api.younited-pay.com/#tag/BestPrice/paths/~1api~11.0~1BestPrice/post
[initialize-doc]: https://api.younited-pay.com/#tag/Contract/paths/~1api~11.0~1Contract/post