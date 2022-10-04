<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounitedpaysdk
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK;

use RuntimeException;
use InvalidArgumentException;
use UnexpectedValueException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use YounitedPaySDK\Cache\Registry;
use YounitedPaySDK\Cache\RegistryItem;
use YounitedPaySDK\Response\ErrorResponse;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\DefaultResponse;
use YounitedPaySDK\Response\ResponseBuilder;
use YounitedPaySDK\Response\CallbackResponse;
use YounitedPaySDK\Exception\RequestException;

/**
 * API client
 */
class Client
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var Stream
     */
    private $stream;

    /**
     * cURL handler
     *
     * @var resource|CurlHandle
     */
    protected $ch;

    /**
     * cURL options array
     *
     * @var array<mixed>
     */
    protected $options;

    /**
     * Maximum request body size
     *
     * @var int
     */
    protected static $MAX_BODY_SIZE;

    /**
    * Create new cURL http client object
    */
    public function __construct()
    {
        self::$MAX_BODY_SIZE = 1024 * 1024;
    }
    /**
     * Set credentials
     *
     * @param string $clientId     api client key
     * @param string $clientSecret api client secret
     *
     * @return self
     */
    public function setCredential($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get Oauth token
     * @param string $tenantId tenantId
     *
     * @return false|string
     */
    private function getToken($tenantId)
    {
        $cache = Registry::getInstance();
        if ($cache->hasItem('token')) {
            /** @var RegistryItem */
            $tokenCache = $cache->getItem('token');
            if ($tokenCache->isExpired() === false) {
                return $tokenCache->get();
            }
        }

        $data['grant_type'] = 'client_credentials';
        $data['client_id'] = $this->clientId;
        $data['client_secret'] = $this->clientSecret;
        $data['scope'] = 'api://younited-pay/.default';

        $headers[] = 'Content-Type: application/x-www-form-urlencoded';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/v2.0/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);

        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            $info = curl_getinfo($ch);
            return false;
        }
        curl_close($ch);
        $output = json_decode((string) $result, true);
        if (empty($output['access_token']) === true) {
            return false;
        }

        $this->setTokenCache(
            $output['access_token'],
            (int) $output['expires_in'] + (new \DateTime())->getTimestamp()
        );

        return $output['access_token'];
    }

    /**
     * @param string $token
     * @param int $expiration
     *
     * @return void
     */
    public function setTokenCache($token, $expiration)
    {
        $expiration = (new \DateTime())->setTimestamp((int) $expiration);
        $cache = Registry::getInstance();
        $cache
            ->getItem('token')
            ->set($token)
            ->expiresAt($expiration);
    }

    /**
     * Send a PSR-7 Request
     *
     * @param AbstractRequest  $request
     * @return ResponseInterface
     *
     * @throws RequestException  Invalid request
     * @throws InvalidArgumentException  Invalid header names and/or values
     * @throws RuntimeException  Failure to create stream
     */
    public function sendRequest(AbstractRequest $request)
    {
        $tenantId = $request->getTenantId();
        $token = $this->getToken($tenantId);
        if ($token === false) {
            return new ErrorResponse(401);
        }

        $headers = [
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];
        $request->setHeaders($headers);

        $response = $this->createResponse($request);
        $options  = $this->createOptions($request, $response);
        $this->ch = curl_init();

        // Setup the cURL request
        curl_setopt_array($this->ch, $options);

        // Execute the request
        $result = curl_exec($this->ch);
        $infos = curl_getinfo($this->ch);
        // Check for any request errors
        switch (curl_errno($this->ch)) {
            case CURLE_OK:
                break;
            case CURLE_COULDNT_RESOLVE_PROXY:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_COULDNT_CONNECT:
            case CURLE_OPERATION_TIMEOUTED:
            case CURLE_SSL_CONNECT_ERROR:
                throw new RequestException('curl error ' . curl_error($this->ch), $request);
            default:
                throw new RequestException('curl error: network error', $request);
        }
        curl_close($this->ch);

        // Get the response
        return $response->getResponse();
    }

    /**
     * Create a new http response
     *
     * @param AbstractRequest $request
     *
     * @return ResponseBuilder
     *
     * @throws RuntimeException  Failure to create stream
     */
    protected function createResponse($request)
    {
        try {
            $this->stream = new Stream();
            $content = fopen('php://temp', 'w+b');
            if ($content === false) {
                $body = $this->stream->create();
            } else {
                $body = $this->stream->create($content);
            }
        } catch (InvalidArgumentException $e) {
            throw new RuntimeException('Unable to create stream "php://temp"');
        }
        $responseObject = $request->getResponseObject();
        $message = DefaultResponse::getInstance($responseObject)
            ->withBody($body);

        return new ResponseBuilder(
            $message
        );
    }

    /**
     * Create array of headers to pass to CURLOPT_HTTPHEADER
     *
     * @param RequestInterface  $request  Request object
     * @param array<mixed> $options  cURL options
     *
     * @return array<mixed> Array of http header lines
     */
    protected function createHeaders(RequestInterface $request, array $options)
    {
        $headers = [];
        $request_headers = $request->getHeaders();

        foreach ($request_headers as $name => $values) {
            $header = strtoupper($name);

            // cURL does not support 'Expect-Continue', skip all 'EXPECT' headers
            if ($header === 'EXPECT') {
                continue;
            }

            if ($header === 'CONTENT-LENGTH') {
                if (array_key_exists(CURLOPT_POSTFIELDS, $options)) {
                    $values = [strlen($options[CURLOPT_POSTFIELDS])];
                }
                // Force content length to '0' if body is empty
                elseif (!array_key_exists(CURLOPT_READFUNCTION, $options)) {
                    $values = [0];
                }
            }

            foreach ($values as $value) {
                $headers[] = $name.': '.$value;
            }
        }

        // Although cURL does not support 'Expect-Continue', it adds the 'Expect'
        // header by default, so we need to force 'Expect' to empty.
        $headers[] = 'Expect:';

        return $headers;
    }

    /**
     * Create cURL request options
     *
     * @param RequestInterface $request
     * @param ResponseBuilder  $response
     *
     * @return array<mixed>  cURL options
     *
     * @throws RequestException  Invalid request
     * @throws InvalidArgumentException  Invalid header names and/or values
     * @throws RuntimeException  Unable to read request body
     */
    protected function createOptions(RequestInterface $request, ResponseBuilder $response)
    {
        $options = $this->options;

        // These options default to false and cannot be changed on set up.
        // The options should be provided with the request instead.
        $options[CURLOPT_FOLLOWLOCATION] = false;
        $options[CURLOPT_HEADER]         = false;
        $options[CURLOPT_RETURNTRANSFER] = false;
        $options[CURLOPT_SSLVERSION]     = CURL_SSLVERSION_TLSv1_2;

        try {
            $options[CURLOPT_HTTP_VERSION] = $this->getProtocolVersion($request->getProtocolVersion());
        } catch (UnexpectedValueException $e) {
            throw new RequestException($e->getMessage(), $request);
        }
        $options[CURLOPT_URL] = (string) $request->getUri();

        $options = $this->addRequestBodyOptions($request, $options);

        $options[CURLOPT_HTTPHEADER] = $this->createHeaders($request, $options);

        if ($request->getUri()->getUserInfo()) {
            $options[CURLOPT_USERPWD] = $request->getUri()->getUserInfo();
        }

        $options[CURLOPT_HEADERFUNCTION] = function ($ch, $data) use ($response) {
            $clean_data = trim($data);

            if ($clean_data !== '') {
                if (strpos(strtoupper($clean_data), 'HTTP/') === 0) {
                    $response->setStatus($clean_data)->getResponse();
                } else {
                    $response->addHeader($clean_data);
                }
            }

            return strlen($data);
        };

        $options[CURLOPT_WRITEFUNCTION] = function ($ch, $data) use ($response) {
            if (empty($response->getResponse()->getBody()) === false) {
                return $response->getResponse()->getBody()->write($data);
            }
            return 0;
        };

        return $options;
    }

    /**
     * Add cURL options related to the request body
     *
     * @param RequestInterface  $request  Request object
     * @param array<mixed>  $options  cURL options
     *
     * @return mixed
     */
    protected function addRequestBodyOptions(RequestInterface $request, array $options)
    {
        /*
         * HTTP methods that cannot have payload:
         * - GET   => cURL will automatically change method to PUT or POST if we
         *            set CURLOPT_UPLOAD or CURLOPT_POSTFIELDS.
         * - HEAD  => cURL treats HEAD as GET request with a same restrictions.
         * - TRACE => According to RFC7231: a client MUST NOT send a message body
         *            in a TRACE request.
         */
        $http_methods = [
            'GET',
            'HEAD',
            'TRACE',
        ];
        if (!in_array($request->getMethod(), $http_methods, true)) {
            $body      = $request->getBody();
            $body_size = $body->getSize();
            if ($body_size !== 0) {
                if ($body->isSeekable()) {
                    $body->rewind();
                }
                if ($body_size === null || $body_size > self::$MAX_BODY_SIZE) {
                    $options[CURLOPT_UPLOAD] = true;

                    if ($body_size !== null) {
                        $options[CURLOPT_INFILESIZE] = $body_size;
                    }

                    $options[CURLOPT_READFUNCTION] = function ($ch, $fd, $len) use ($body) {
                        return $body->read($len);
                    };
                } else {
                    $options[CURLOPT_POSTFIELDS] = (string) $body;
                }
            }
        }

        if ($request->getMethod() === 'HEAD') {
            $options[CURLOPT_NOBODY] = true;
        } elseif ($request->getMethod() !== 'GET') {
            $options[CURLOPT_CUSTOMREQUEST] = $request->getMethod();
        }

        return $options;
    }

    /**
     * Get cURL constant for request http protocol version
     *
     * @param string $requestProtocolVersion  Request http protocol version
     * @return int   cURL constant for request http protocol version
     *
     * @throws UnexpectedValueException  Unsupported cURL http protocol version
     */
    protected function getProtocolVersion($requestProtocolVersion)
    {
        switch ($requestProtocolVersion) {
            case '1.0':
                return CURL_HTTP_VERSION_1_0;
            case '1.1':
                return CURL_HTTP_VERSION_1_1;
            case '2.0':
                if (defined('CURL_HTTP_VERSION_2_0')) {
                    return CURL_HTTP_VERSION_2_0;
                }

                throw new UnexpectedValueException('libcurl 7.33 required for HTTP 2.0');
        }

        return CURL_HTTP_VERSION_NONE;
    }

    /**
     * Retrieve a callback request from API
     *
     * @return ResponseInterface
     *
     * @throws RuntimeException  Failure to create stream
     */
    public function retrieveCallbackResponse()
    {
        try {
            $this->stream = new Stream();
            $content = fopen('php://temp', 'w+b');
            if ($content === false) {
                $body = $this->stream->create();
            } else {
                $body = $this->stream->create($content);
            }
        } catch (InvalidArgumentException $e) {
            throw new RuntimeException('Unable to create stream "php://temp"');
        }

        $message = DefaultResponse::getInstance(CallbackResponse::class)->withBody($body);

        $response = (new ResponseBuilder($message))->getResponse();
        $headers = $this->get_apache_nginx_headers();

        if (isset($headers['X-YC-SIGNATURE-256']) === false || isset($headers['X-YC-DATETIME']) === false) {
            return $response->withStatus(401, 'No Signature or Datetime header');
        }

        $headerSignatureRequest = $headers['X-YC-SIGNATURE-256'];
        $headerDatetimeRequest = $headers['X-YC-DATETIME'];

        if (empty($headerSignatureRequest) === true || empty($headerDatetimeRequest) === true) {
            return $response->withStatus(401, 'Signature or Datetime header empty');
        }

        $currentWebhookUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $payload = file_get_contents('php://input');

        $hashData = implode('|', [
            $currentWebhookUrl,
            $payload,
            $headerDatetimeRequest
        ]);

        $expectedSignature = hash_hmac('sha256', $hashData, $this->clientSecret);

        if ($headerSignatureRequest !== $expectedSignature) {
            return $response->withStatus(401, 'Hash not accepted.');
        }

        return $response->setBody($payload !== false ? $payload : '');
    }

    /**
     * Function to get apache / ngynx headers
     *
     * @return string[] $headers
     */
    private function get_apache_nginx_headers()
    {
        $headers=[];

        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5)=='HTTP_') {
                $name=substr($name, 5);
                $name=str_replace('_', ' ', $name);
                $name=ucwords($name);
                $name=str_replace(' ', '-', $name);
                $name=strtoupper($name);
                $headers[$name] = $value;
            } elseif (strpos($name, 'X-YC-') !== false) {
                $name=strtoupper($name);
                $headers[$name] = $value;
            }
        }


        return $headers;
    }
}
