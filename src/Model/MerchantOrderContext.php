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
     * @return void
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
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
     * @return void
     */
    public function setAgentEmailAddress($agentEmailAddress)
    {
        $this->agentEmailAddress = $agentEmailAddress;
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
     * @return void
     */
    public function setMerchantReference($merchantReference)
    {
        $this->merchantReference = $merchantReference;
    }
}
