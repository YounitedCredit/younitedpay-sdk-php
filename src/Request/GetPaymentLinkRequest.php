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

use InvalidArgumentException;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\GetPaymentLink;
use YounitedPaySDK\Response\GetPaymentLinkResponse;

/**
 * Get Payment Link Request Class
 */
class GetPaymentLinkRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $requestTarget = '/payments/{id}/link';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = GetPaymentLinkResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof GetPaymentLink) {
            $this->requestTarget = str_replace(
                '{id}',
                urlencode($body->getId()),
                $this->requestTarget
            );
            return parent::setModel($body);
        }

        throw new InvalidArgumentException(
            'Body must be an instance of ' .  GetPaymentLink::class . ' ' . get_class($body) . ' given.'
        );
    }
}
