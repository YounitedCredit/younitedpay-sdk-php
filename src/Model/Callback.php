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

namespace YounitedPaySDK\Model;

class Callback extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var null|string
     */
    private $contractReference;

    /**
     * @var null|string
     */
    private $merchantReference;

    /**
     * @var null|string
     */
    private $merchantOrderId;

    /**
     * @var string
     */
    private $eventDate;

    /**
     * @var int
     */
    private $triggeredForStatus;

    // GETTERS & SETTERS

    /**
     * Get Contract Reference.
     *
     * @return null|string
     */
    public function getContractReference()
    {
        return $this->contractReference;
    }

    /**
     * Set Contract Reference.
     *
     * @param null|string $contractReference
     *
     * @return self
     */
    public function setContractReference($contractReference)
    {
        if (true === \is_string($contractReference) || (null === $contractReference) === true) {
            $this->contractReference = $contractReference;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Contract Reference must be a string or null but '.\gettype($contractReference).' is given.'
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
     * Get Merchant Order Id.
     *
     * @return null|string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * Set Merchant Order Id.
     *
     * @param null|string $merchantOrderId
     *
     * @return self
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        if (true === \is_string($merchantOrderId) || (null === $merchantOrderId) === true) {
            $this->merchantOrderId = $merchantOrderId;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Merchant Order Id must be a string or null but '.\gettype($merchantOrderId).' is given.'
        );
    }

    /**
     * Get Event Date.
     *
     * @return string
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set Event Date.
     *
     * @param string $eventDate
     *
     * @return self
     */
    public function setEventDate($eventDate)
    {
        if (true === \is_string($eventDate)) {
            $this->eventDate = $eventDate;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Event Date must be a string but '.\gettype($eventDate).' is given.'
        );
    }

    /**
     * Get Triggered For Status.
     *
     * @return int
     */
    public function getTriggeredForStatus()
    {
        return $this->triggeredForStatus;
    }

    /**
     * Set Triggered For Status.
     *
     * @param int $triggeredForStatus
     *
     * @return self
     */
    public function setTriggeredForStatus($triggeredForStatus)
    {
        if (true === \is_int($triggeredForStatus)) {
            $this->triggeredForStatus = $triggeredForStatus;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Triggered For Status must be an integer but '.\gettype($triggeredForStatus).' is given.'
        );
    }
}
