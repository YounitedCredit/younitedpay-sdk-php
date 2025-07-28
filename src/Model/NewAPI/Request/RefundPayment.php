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

namespace YounitedPaySDK\Model\NewAPI\Request;

use InvalidArgumentException;
use JsonSerializable;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\NewAPI\BasketDescription;
use YounitedPaySDK\Model\NewAPI\CustomerInformation;
use YounitedPaySDK\Model\NewAPI\CustomExperience;
use YounitedPaySDK\Model\NewAPI\LoanRequest;
use YounitedPaySDK\Model\NewAPI\MerchantContext;
use YounitedPaySDK\Model\NewAPI\RiskInsights;
use YounitedPaySDK\Model\NewAPI\TechnicalInformation;

/**
 * Refund Payment Model Class
 */
class RefundPayment extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $paymentId;

    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var float
     */
    private $amount;

    // GETTERS & SETTERS

    /**
     * Get Payment Id
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set Payment Id
     *
     * @param string $paymentId
     *
     * @return RefundPayment
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * Get Idempotency Key
     *
     * @return string
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Set Idempotency Key
     *
     * @param string $idempotencyKey
     *
     * @return RefundPayment
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;

        return $this;
    }

    /**
     * Get Amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get Amount
     *
     * @param float $amount
     *
     * @return RefundPayment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}
