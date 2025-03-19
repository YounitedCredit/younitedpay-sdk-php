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

namespace YounitedPaySDK\Request;

use YounitedPaySDK\Response\DefaultResponse;

/**
 * Get Merchant Shops Request Class
 */
class GetMerchantShopsRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $apiVersion = '2025-01-01';

    /**
     * @var string
     */
    protected $requestTarget = '/shops';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = DefaultResponse::class;
}
