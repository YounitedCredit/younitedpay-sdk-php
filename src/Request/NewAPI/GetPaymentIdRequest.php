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

use InvalidArgumentException;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\NewAPI\GetPaymentId;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\DefaultResponse;

/**
 * Cancel Contract Request Class
 */
class GetPaymentIdRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $apiVersion = '2025-01-01';

    /**
     * @var string
     */
    protected $requestTarget = '/specific-use-cases/legacy-contracts/{contractReference}/payment-id';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = DefaultResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof GetPaymentId) {
            $this->requestTarget = str_replace(
                '{contractReference}',
                urlencode($body->getContractReference()),
                $this->requestTarget
            );
            return parent::setModel($body);
        }

        throw new InvalidArgumentException(
            'Body must be an instance of ' .  GetPaymentId::class . ' but ' . get_class($body) . ' is given.'
        );
    }
}
