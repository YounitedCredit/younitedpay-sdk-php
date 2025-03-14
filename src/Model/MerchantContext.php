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

namespace YounitedPaySDK\Model;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Merchant Order Context Model Class
 */
class MerchantContext extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $shopCode;

    /**
     * @var string
     */
    private $merchantReference;

    /**
     * @var string|null
     */
    private $salesClerkContactEmailAddress;

    // GETTERS & SETTERS

    /**
     * Get Shop Code
     *
     * @return string
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set Shop Code
     *
     * @param string $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (is_string($shopCode) === true) {
            $this->shopCode = $shopCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Shop Code must be a string but ' . gettype($shopCode) . ' is given.'
        );
    }

    /**
     * Get Merchant Reference
     *
     * @return string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * Set Merchant Reference
     *
     * @param string $merchantReference
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (is_string($merchantReference) === true) {
            $this->merchantReference = $merchantReference;
            return $this;
        }

        throw new InvalidArgumentException(
            'Merchant Reference must be a string but ' . gettype($merchantReference) . ' is given.'
        );
    }

    /**
     * Get Sales Clerk Contact Email Address Address
     *
     * @return string|null
     */
    public function getSalesClerkContactEmailAddress()
    {
        return $this->salesClerkContactEmailAddress;
    }

    /**
     * Set Sales Clerk Contact Email Address
     *
     * @param string|null $salesClerkContactEmailAddress
     *
     * @return self
     */
    public function setSalesClerkContactEmailAddress($salesClerkContactEmailAddress)
    {
        if (is_string($salesClerkContactEmailAddress) === true || is_null($salesClerkContactEmailAddress) === true) {
            $this->salesClerkContactEmailAddress = $salesClerkContactEmailAddress;
            return $this;
        }

        throw new InvalidArgumentException(
            'Sales Clerk Contact Email Address must be a string or null but ' . gettype($salesClerkContactEmailAddress) . ' is given.'
        );
    }
}
