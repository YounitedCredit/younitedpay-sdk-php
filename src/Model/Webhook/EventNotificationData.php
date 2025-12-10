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

namespace YounitedPaySDK\Model\Webhook;

use InvalidArgumentException;
use YounitedPaySDK\Model\AbstractModel;

/**
 * Event Notification Data Model Class
 */
class EventNotificationData extends AbstractModel
{
    // PROPERTIES

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var string|null
     */
    private $merchantReference;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var float|null
     */
    private $amount;

    /**
     * @var string|null
     */
    private $withdrawnAt;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    // GETTERS & SETTERS

    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_string($type) === true) {
            $this->type = $type;

            return $this;
        }

        throw new InvalidArgumentException(
            'Type must be a string but ' . gettype($type) . ' is given.'
        );
    }

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
     * @return self
     */
    public function setPaymentId($paymentId)
    {
        if (is_string($paymentId) === true) {
            $this->paymentId = $paymentId;

            return $this;
        }

        throw new InvalidArgumentException(
            'Payment Id must be a string but ' . gettype($paymentId) . ' is given.'
        );
    }

    /**
     * Get Status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Status
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_string($status) === true || is_null($status) === true) {
            $this->status = $status;

            return $this;
        }

        throw new InvalidArgumentException(
            'Status must be a string or null but ' . gettype($status) . ' is given.'
        );
    }

    /**
     * Get Reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set Reference
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_string($reference) === true || is_null($reference) === true) {
            $this->reference = $reference;

            return $this;
        }

        throw new InvalidArgumentException(
            'Reference must be a string or null but ' . gettype($reference) . ' is given.'
        );
    }

    /**
     * Get Merchant Reference
     *
     * @return string|null
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * Set Merchant Reference
     *
     * @param string|null $merchantReference
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (is_string($merchantReference) === true || is_null($merchantReference) === true) {
            $this->merchantReference = $merchantReference;

            return $this;
        }

        throw new InvalidArgumentException(
            'Merchant Reference must be a string or null but ' . gettype($merchantReference) . ' is given.'
        );
    }

    /**
     * Get Payment Type
     *
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set Payment Type
     *
     * @param string $paymentType
     *
     * @return self
     */
    public function setPaymentType($paymentType)
    {
        if (is_string($paymentType) === true) {
            $this->paymentType = $paymentType;

            return $this;
        }

        throw new InvalidArgumentException(
            'Payment Type must be a string but ' . gettype($paymentType) . ' is given.'
        );
    }

    /**
     * Get Amount
     *
     * @return float|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set Amount
     *
     * @param float|null|int $amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if ((float) $amount >= 0 || is_null($amount)) {
            if (is_null($amount)) {
                $this->amount = $amount;
            } else {
                $this->amount = (float) $amount;
            }
            return $this;
        }

        throw new InvalidArgumentException(
        'Amount must be a float, integer or null but ' . gettype($amount) . ' is given.'
        );
    }

    /**
     * Get Withdrawn At
     *
     * @return string|null
     */
    public function getWithdrawnAt()
    {
        return $this->withdrawnAt;
    }

    /**
     * Set Withdrawn At
     *
     * @param string|null $withdrawnAt
     *
     * @return self
     */
    public function setWithdrawnAt($withdrawnAt)
    {
        if (is_string($withdrawnAt) === true || is_null($withdrawnAt) === true) {
            $this->withdrawnAt = $withdrawnAt;

            return $this;
        }

        throw new InvalidArgumentException(
            'Withdrawn At must be a string or null but ' . gettype($withdrawnAt) . ' is given.'
        );
    }

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set Created At
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        if (is_string($createdAt) === true) {
            $this->createdAt = $createdAt;

            return $this;
        }

        throw new InvalidArgumentException(
            'Created At must be a string but ' . gettype($createdAt) . ' is given.'
        );
    }

    /**
     * Get Updated At
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set Updated At
     *
     * @param string|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        if (is_string($updatedAt) === true || is_null($updatedAt) === true) {
            $this->updatedAt = $updatedAt;

            return $this;
        }

        throw new InvalidArgumentException(
            'Updated At must be a string or null but ' . gettype($updatedAt) . ' is given.'
        );
    }
}
