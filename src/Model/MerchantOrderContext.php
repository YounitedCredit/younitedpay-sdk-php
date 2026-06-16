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

/**
 * Merchant Order Context Model Class.
 */
class MerchantOrderContext extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $channel;

    /**
     * @var null|string
     */
    private $shopCode;

    /**
     * @var null|string
     */
    private $agentEmailAddress;

    /**
     * @var null|string
     */
    private $merchantReference;

    // GETTERS & SETTERS

    /**
     * Get Channel.
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
        if (true === \is_string($channel)) {
            $this->channel = $channel;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Channel must be a string but '.\gettype($channel).' is given.'
        );
    }

    /**
     * Get Shop Code.
     *
     * @return null|string
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set Shop Code.
     *
     * @param null|string $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (true === \is_string($shopCode) || (null === $shopCode) === true) {
            $this->shopCode = $shopCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Shop Code must be a string or null but '.\gettype($shopCode).' is given.'
        );
    }

    /**
     * Get Agent Email Address.
     *
     * @return null|string
     */
    public function getAgentEmailAddress()
    {
        return $this->agentEmailAddress;
    }

    /**
     * Set Agent Email Address.
     *
     * @param null|string $agentEmailAddress
     *
     * @return self
     */
    public function setAgentEmailAddress($agentEmailAddress)
    {
        if (true === \is_string($agentEmailAddress) || (null === $agentEmailAddress) === true) {
            $this->agentEmailAddress = $agentEmailAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Agent Email Address must be a string or null but '.\gettype($agentEmailAddress).' is given.'
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
}
