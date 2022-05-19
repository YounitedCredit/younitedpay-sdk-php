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

namespace YounitedPaySDK\Service;

use Psr\Http\Message\ResponseInterface;
use YounitedPaySDK\Client;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\ErrorResponse;

abstract class AbstractClientApiService
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var bool
     */
    protected $enableTest = false;

    /**
     * @return $this
     */
    public function enableTest()
    {
        $new = clone $this;

        $new->enableTest = true;

        return $new;
    }

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param AbstractModel|null $body
     * @param AbstractRequest $request
     *
     * @return ResponseInterface
     */
    protected function call($body, AbstractRequest $request)
    {
        try {
            if (empty($body) === false) {
                $request = $request->setModel($body);
            }
            if ($this->enableTest) {
                $request = $request->enableSandbox();
            }
            $response = $this->client->sendRequest($request);
        } catch (\Exception $e) {
            $message = $e->getMessage() . $e->getFile() . ':' . $e->getLine(). $e->getTraceAsString();
            $response = (new ErrorResponse(400, [], null, '1.1', $message));
        }

        return $response;
    }
}
