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
use YounitedPaySDK\Model\NewAPI\Request\ExecutePayment;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\NewAPI\ExecutePaymentResponse;

/**
 * Execute Payment Request Class.
 */
class ExecutePaymentRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $apiVersion = '2025-01-01';

    /**
     * @var string
     */
    protected $requestTarget = '/payments/{id}/execute';

    /**
     * @var string
     */
    protected $method = 'POST';

    /** @var string */
    protected $response = ExecutePaymentResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof ExecutePayment) {
            $this->requestTarget = str_replace(
                '{id}',
                urlencode($body->getId()),
                $this->requestTarget
            );

            return parent::setModel($body);
        }

        throw new \InvalidArgumentException(
            'Body must be an instance of '.ExecutePayment::class.' but '.\get_class($body).' is given.'
        );
    }
}
