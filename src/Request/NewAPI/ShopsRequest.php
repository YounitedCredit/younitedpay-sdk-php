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

namespace YounitedPaySDK\Request\NewAPI;

use YounitedPaySDK\Stream;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\NewAPI\BestPrice;
use YounitedPaySDK\Response\DefaultResponse;

/**
 * Get Best Price
 */
class ShopsRequest extends AbstractRequest
{
    /**
     * @var AbstractModel
     */
    protected $body = '';

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
