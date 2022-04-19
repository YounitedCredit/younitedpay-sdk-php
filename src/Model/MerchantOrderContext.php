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
     * @var string
     */
    private $agentEmailAddress;

    /**
     * @var string
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
     * Get Agent Email Address
     *
     * @return string
     */
    public function getAgentEmailAddress()
    {
        return $this->agentEmailAddress;
    }

    /**
     * Set Agent Email Address
     *
     * @param string $agentEmailAddress
     *
     * @return self
     */
    public function setAgentEmailAddress($agentEmailAddress)
    {
        if (is_string($agentEmailAddress) === true) {
            $this->agentEmailAddress = $agentEmailAddress;
            return $this;
        }

        throw new InvalidArgumentException(
            'Agent Email Address must be a string but ' . gettype($agentEmailAddress) . ' is given.'
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
}
