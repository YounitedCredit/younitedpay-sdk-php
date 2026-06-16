<?php

declare(strict_types=1);

/*
 *     NOTICE OF LICENSE
 *
 *     This source file is subject to the Open Software License (OSL 3.0)
 *     PHP version 5.6+
 *
 *     @category  YounitedpaySDK
 *     @package   Ecommerceyounitedpaysdk
 *     @author    202-ecommerce <tech@202-ecommerce.com>
 *     @copyright 2022 (c) 202-ecommerce
 *     @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 *     @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Request\NewAPI;

use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\NewAPI\Request\UpdateMerchantReference;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\DefaultResponse;

/**
 * Update Merchant Reference Request Class.
 */
class UpdateMerchantReferenceRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $apiVersion = '2025-01-01';

    /**
     * @var string
     */
    protected $requestTarget = '/specific-use-cases/payments/{paymentId}/merchant-reference';

    /**
     * @var string
     */
    protected $method = 'PATCH';

    /** @var string */
    protected $response = DefaultResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof UpdateMerchantReference) {
            $this->requestTarget = str_replace(
                '{paymentId}',
                urlencode($body->getPaymentId()),
                $this->requestTarget
            );

            $body->setIgnoredProperties('paymentId');

            return parent::setModel($body);
        }

        throw new \InvalidArgumentException(
            'Body must be an instance of '.UpdateMerchantReference::class.' but '.\get_class($body).' is given.'
        );
    }
}
