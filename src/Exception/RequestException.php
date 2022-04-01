<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounit
 * edpaysdk
 * @author    Patrick Stearns and contributors to pdeans/http
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Exception;

use RuntimeException;
use Exception;
use Psr\Http\Message\RequestInterface;

/**
 * Request Exception
 *
 * Failed http request exception class
 */
class RequestException extends RuntimeException
{
    /**
     * Request object
     *
     * @var RequestInterface
     */
    private $request;

    /**
     * Create request exception object
     *
     * @param string  $message  Exception message
     * @param RequestInterface  $request  Request object
     * @param \Exception|null  $last_exception  Previous exception object
     */
    public function __construct($message, RequestInterface $request, Exception $last_exception = null)
    {
        $this->request = $request;

        parent::__construct($message, 0, $last_exception);
    }

    /**
     * Get the request object
     *
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
}
