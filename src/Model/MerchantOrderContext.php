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
class MerchantOrderContext extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $channel;

    /**
     * @var string|null
     */
    private $shopCode;

    /**
     * @var string|null
     */
    private $agentEmailAddress;

    /**
     * @var string|null
     */
    private $merchantReference;

    // GETTERS & SETTERS

    /**
     * Get Channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set Channel
     * Possible values are : ONLINE / PHYSICAL.
     *
     * @param string $channel
     *
     * @return self
     */
    public function setChannel($channel)
    {
        if (is_string($channel) === true) {
            $this->channel = $channel;
            return $this;
        }

        throw new InvalidArgumentException(
            'Channel must be a string but ' . gettype($channel) . ' is given.'
        );
    }

    /**
     * Get Shop Code
     *
     * @return string|null
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set Shop Code
     *
     * @param string|null $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (is_string($shopCode) === true || is_null($shopCode) === true) {
            $this->shopCode = $shopCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Shop Code must be a string or null but ' . gettype($shopCode) . ' is given.'
        );
    }

    /**
     * Get Agent Email Address
     *
     * @return string|null
     */
    public function getAgentEmailAddress()
    {
        return $this->agentEmailAddress;
    }

    /**
     * Set Agent Email Address
     *
     * @param string|null $agentEmailAddress
     *
     * @return self
     */
    public function setAgentEmailAddress($agentEmailAddress)
    {
        if (is_string($agentEmailAddress) === true || is_null($agentEmailAddress) === true) {
            $this->agentEmailAddress = $agentEmailAddress;
            return $this;
        }

        throw new InvalidArgumentException(
            'Agent Email Address must be a string or null but ' . gettype($agentEmailAddress) . ' is given.'
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
}
