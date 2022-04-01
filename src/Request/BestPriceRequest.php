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

use YounitedPaySDK\Model\BestPrice;
use Psr\Http\Message\RequestInterface;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Response\BestPriceResponse;

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

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof BestPrice) {
            return parent::setModel($body);
        }

        throw new \InvalidArgumentException(
            'Body must be an instance of ' .  BestPrice::class . ' ' . get_class($body) . ' given.'
        );
    }
}
