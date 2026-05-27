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

namespace YounitedPaySDK\Model\NewAPI;

use InvalidArgumentException;
use JsonSerializable;
use YounitedPaySDK\Model\AbstractModel;

/**
 * Technical Information Model Class
 */
class TechnicalInformation extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $webhookNotificationUrl;

    /**
     * @var string
     */
    private $apiVersion;

    /**
     * @var string
     */
    private $webhookNotificationApiVersion;

    // GETTERS & SETTERS

    /**
     * Get Webhook Notification Url
     *
     * @return string
     */
    public function getWebhookNotificationUrl()
    {
        return $this->webhookNotificationUrl;
    }

    /**
     * Set Webhook Notification Url
     *
     * @param string $webhookNotificationUrl
     *
     * @return self
     */
    public function setWebhookNotificationUrl($webhookNotificationUrl)
    {
        if (is_string($webhookNotificationUrl) === true) {
            $this->webhookNotificationUrl = $webhookNotificationUrl;
            return $this;
        }

        throw new InvalidArgumentException(
            'Webhook Notification Url must be a string but ' . gettype($webhookNotificationUrl) . ' is given.'
        );
    }

    /**
     * Get Api Version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * Set Api Version
     *
     * @param string $apiVersion
     *
     * @return self
     */
    public function setApiVersion($apiVersion)
    {
        if (is_string($apiVersion) === true) {
            $this->apiVersion = $apiVersion;
            return $this;
        }

        throw new InvalidArgumentException(
            'Api Version must be a string but ' . gettype($apiVersion) . ' is given.'
        );
    }

    /**
     * Get the value of webhookNotificationApiVersion
     *
     * @return  string
     */
    public function getWebhookNotificationApiVersion()
    {
        return $this->webhookNotificationApiVersion;
    }

    /**
     * Set the value of webhookNotificationApiVersion
     *
     * @param   string  $webhookNotificationApiVersion
     *
     * @return  self
     */
    public function setWebhookNotificationApiVersion($webhookNotificationApiVersion)
    {
        if (is_string($webhookNotificationApiVersion) === true) {
            $this->webhookNotificationApiVersion = $webhookNotificationApiVersion;
            return $this;
        }

        throw new InvalidArgumentException(
            'Webhook Notification Api Version must be a string but ' . gettype($webhookNotificationApiVersion) . ' is given.'
        );
    }
}
