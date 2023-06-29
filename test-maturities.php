<?php
require 'vendor/autoload.php';

use YounitedPaySDK\Client;
use YounitedPaySDK\Request\AvailableMaturitiesRequest;

$clientId = '70c668c4-1233-4841-a603-ddfa3f14be8b';
$clientSecret = '3dx7Q~2dAEeEwaJQ2Jhzab2Qgt~OPxWf88O~y';

$request = (new AvailableMaturitiesRequest())
    ->enableSandbox();

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