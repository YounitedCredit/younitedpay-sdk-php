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

namespace YounitedPaySDK\Model\Webhook;

use YounitedPaySDK\Model\AbstractModel;

/**
 * Event Notification Data Model Class.
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
     * @var null|string
     */
    private $status;

    /**
     * @var null|string
     */
    private $reference;

    /**
     * @var null|string
     */
    private $merchantReference;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var null|float
     */
    private $amount;

    /**
     * @var null|string
     */
    private $withdrawnAt;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var null|string
     */
    private $updatedAt;

    // GETTERS & SETTERS

    /**
     * Get Type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        if (true === \is_string($type)) {
            $this->type = $type;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Type must be a string but '.\gettype($type).' is given.'
        );
    }

    /**
     * Get Payment Id.
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set Payment Id.
     *
     * @param string $paymentId
     *
     * @return self
     */
    public function setPaymentId($paymentId)
    {
        if (true === \is_string($paymentId)) {
            $this->paymentId = $paymentId;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Payment Id must be a string but '.\gettype($paymentId).' is given.'
        );
    }

    /**
     * Get Status.
     *
     * @return null|string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Status.
     *
     * @param null|string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (true === \is_string($status) || (null === $status) === true) {
            $this->status = $status;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Status must be a string or null but '.\gettype($status).' is given.'
        );
    }

    /**
     * Get Reference.
     *
     * @return null|string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set Reference.
     *
     * @param null|string $reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (true === \is_string($reference) || (null === $reference) === true) {
            $this->reference = $reference;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Reference must be a string or null but '.\gettype($reference).' is given.'
        );
    }

    /**
     * Get Merchant Reference.
     *
     * @return null|string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * Set Merchant Reference.
     *
     * @param null|string $merchantReference
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (true === \is_string($merchantReference) || (null === $merchantReference) === true) {
            $this->merchantReference = $merchantReference;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Merchant Reference must be a string or null but '.\gettype($merchantReference).' is given.'
        );
    }

    /**
     * Get Payment Type.
     *
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set Payment Type.
     *
     * @param string $paymentType
     *
     * @return self
     */
    public function setPaymentType($paymentType)
    {
        if (true === \is_string($paymentType)) {
            $this->paymentType = $paymentType;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Payment Type must be a string but '.\gettype($paymentType).' is given.'
        );
    }

    /**
     * Get Amount.
     *
     * @return null|float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set Amount.
     *
     * @param null|float|int $amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if ((float) $amount >= 0 || null === $amount) {
            if (null === $amount) {
                $this->amount = $amount;
            } else {
                $this->amount = (float) $amount;
            }

            return $this;
        }

        throw new \InvalidArgumentException(
            'Amount must be a float, integer or null but '.\gettype($amount).' is given.'
        );
    }

    /**
     * Get Withdrawn At.
     *
     * @return null|string
     */
    public function getWithdrawnAt()
    {
        return $this->withdrawnAt;
    }

    /**
     * Set Withdrawn At.
     *
     * @param null|string $withdrawnAt
     *
     * @return self
     */
    public function setWithdrawnAt($withdrawnAt)
    {
        if (true === \is_string($withdrawnAt) || (null === $withdrawnAt) === true) {
            $this->withdrawnAt = $withdrawnAt;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Withdrawn At must be a string or null but '.\gettype($withdrawnAt).' is given.'
        );
    }

    /**
     * Get Created At.
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set Created At.
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        if (true === \is_string($createdAt)) {
            $this->createdAt = $createdAt;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Created At must be a string but '.\gettype($createdAt).' is given.'
        );
    }

    /**
     * Get Updated At.
     *
     * @return null|string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set Updated At.
     *
     * @param null|string $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        if (true === \is_string($updatedAt) || (null === $updatedAt) === true) {
            $this->updatedAt = $updatedAt;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Updated At must be a string or null but '.\gettype($updatedAt).' is given.'
        );
    }
}
