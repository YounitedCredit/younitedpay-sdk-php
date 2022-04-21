<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounitedpaysdk
 * @author    Michael Dowling and contributors to guzzlehttp/psr7
 * @author    Tobias Nyholm  and contributors to Nyholm/psr7
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Model;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Contract Model Class
 */
class Contract extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $status;

    /**
     * @var bool
     */
    private $applicationSucceeded;

    /**
     * @var OfferItem
     */
    private $offer;

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @var MerchantOrderContext
     */
    private $merchantOrderContext;

    // GETTERS & SETTERS

    /**
     * Get Reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set Reference
     *
     * @param string $reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_string($reference) === true) {
            $this->reference = $reference;
            return $this;
        }

        throw new InvalidArgumentException(
            'Reference must be a string but ' . gettype($reference) . ' is given.'
        );
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Status
     * Possible values are : INITIALIZED / GRANTED / CONFIRMED / FINANCED / WITHDRAWN / CANCELED / REJECTED
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_string($status) === true) {
            $this->status = $status;
            return $this;
        }

        throw new InvalidArgumentException(
            'Status must be a string but ' . gettype($status) . ' is given.'
        );
    }

    /**
     * Get Application Succeeded
     *
     * @return bool
     */
    public function getApplicationSucceeded()
    {
        return $this->applicationSucceeded;
    }

    /**
     * Set Application Succeeded
     *
     * @param bool $applicationSucceeded
     *
     * @return self
     */
    public function setApplicationSucceeded($applicationSucceeded)
    {
        if (is_bool($applicationSucceeded) === true) {
            $this->applicationSucceeded = $applicationSucceeded;
            return $this;
        }

        throw new InvalidArgumentException(
            'Application Succeeded must be a boolean but ' . gettype($applicationSucceeded) . ' is given.'
        );
    }

    /**
     * Get Offer
     *
     * @return OfferItem
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set Offer
     *
     * @param OfferItem $offer
     *
     * @return self
     */
    public function setOffer($offer)
    {
        if ($offer instanceof OfferItem) {
            $this->offer = $offer;
            return $this;
        }

        throw new InvalidArgumentException(
            'Offer must be an instance of ' . OfferItem::class . ' but ' . get_class($offer) . ' is given.'
        );
    }

    /**
     * Get Basket
     *
     * @return Basket
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * Set Basket
     *
     * @param Basket $basket
     *
     * @return self
     */
    public function setBasket($basket)
    {
        if ($basket instanceof Basket) {
            $this->basket = $basket;
            return $this;
        }

        throw new InvalidArgumentException(
            'Basket must be an instance of ' . Basket::class . ' but ' . get_class($basket) . ' is given.'
        );
    }

    /**
     * Get Merchant Order Context
     *
     * @return MerchantOrderContext
     */
    public function getMerchantOrderContext()
    {
        return $this->merchantOrderContext;
    }

    /**
     * Set Merchant Order Context
     *
     * @param MerchantOrderContext $merchantOrderContext
     *
     * @return self
     */
    public function setMerchantOrderContext($merchantOrderContext)
    {
        if ($merchantOrderContext instanceof MerchantOrderContext) {
            $this->merchantOrderContext = $merchantOrderContext;
            return $this;
        }

        throw new InvalidArgumentException(
            'Merchant Order Context must be an instance of ' . MerchantOrderContext::class . ' but ' . get_class($merchantOrderContext) . ' is given.'
        );
    }
}
