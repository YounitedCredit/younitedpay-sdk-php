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

namespace YounitedPaySDK\Model\NewAPI;

use YounitedPaySDK\Model\AbstractModel;

/**
 * Merchant Order Context Model Class.
 */
class MerchantContext extends AbstractModel implements \JsonSerializable
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
     * @var null|string
     */
    private $salesClerkContactEmailAddress;

    // GETTERS & SETTERS

    /**
     * Get Shop Code.
     *
     * @return string
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set Shop Code.
     *
     * @param string $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (true === \is_string($shopCode)) {
            $this->shopCode = $shopCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Shop Code must be a string but '.\gettype($shopCode).' is given.'
        );
    }

    /**
     * Get Merchant Reference.
     *
     * @return string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * Set Merchant Reference.
     *
     * @param string $merchantReference
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (true === \is_string($merchantReference)) {
            $this->merchantReference = $merchantReference;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Merchant Reference must be a string but '.\gettype($merchantReference).' is given.'
        );
    }

    /**
     * Get Sales Clerk Contact Email Address Address.
     *
     * @return null|string
     */
    public function getSalesClerkContactEmailAddress()
    {
        return $this->salesClerkContactEmailAddress;
    }

    /**
     * Set Sales Clerk Contact Email Address.
     *
     * @param null|string $salesClerkContactEmailAddress
     *
     * @return self
     */
    public function setSalesClerkContactEmailAddress($salesClerkContactEmailAddress)
    {
        if (true === \is_string($salesClerkContactEmailAddress) || (null === $salesClerkContactEmailAddress) === true) {
            $this->salesClerkContactEmailAddress = $salesClerkContactEmailAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Sales Clerk Contact Email Address must be a string or null but '.\gettype($salesClerkContactEmailAddress).' is given.'
        );
    }
}
