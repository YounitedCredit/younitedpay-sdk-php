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

namespace Tot\YounitedPaySDK\Request;

use Tot\YounitedPaySDK\Model\BestPrice;
use Psr\Http\Message\RequestInterface;
use Tot\YounitedPaySDK\Response\BestPriceResponse;

/**
 * Get Best Price
 */
class BestPriceRequest extends AbstractRequest implements RequestInterface
{
    /**
     * @var BestPrice
     */
    protected $body;

    /**
     * @var string
     */
    protected $requestTarget = '/BestPrice';

    /**
     * @var string
     */
    protected $method = 'POST';

    /** @var string */
    protected $response = BestPriceResponse::class;
}
