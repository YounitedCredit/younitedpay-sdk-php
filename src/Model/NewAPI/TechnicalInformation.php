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
 * Technical Information Model Class.
 */
class TechnicalInformation extends AbstractModel implements \JsonSerializable
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
     * Get Webhook Notification Url.
     *
     * @return string
     */
    public function getWebhookNotificationUrl()
    {
        return $this->webhookNotificationUrl;
    }

    /**
     * Set Webhook Notification Url.
     *
     * @param string $webhookNotificationUrl
     *
     * @return self
     */
    public function setWebhookNotificationUrl($webhookNotificationUrl)
    {
        if (true === \is_string($webhookNotificationUrl)) {
            $this->webhookNotificationUrl = $webhookNotificationUrl;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Webhook Notification Url must be a string but '.\gettype($webhookNotificationUrl).' is given.'
        );
    }

    /**
     * Get Api Version.
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * Set Api Version.
     *
     * @param string $apiVersion
     *
     * @return self
     */
    public function setApiVersion($apiVersion)
    {
        if (true === \is_string($apiVersion)) {
            $this->apiVersion = $apiVersion;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Api Version must be a string but '.\gettype($apiVersion).' is given.'
        );
    }

    /**
     * Get the value of webhookNotificationApiVersion.
     *
     * @return string
     */
    public function getWebhookNotificationApiVersion()
    {
        return $this->webhookNotificationApiVersion;
    }

    /**
     * Set the value of webhookNotificationApiVersion.
     *
     * @param string $webhookNotificationApiVersion
     *
     * @return self
     */
    public function setWebhookNotificationApiVersion($webhookNotificationApiVersion)
    {
        if (true === \is_string($webhookNotificationApiVersion)) {
            $this->webhookNotificationApiVersion = $webhookNotificationApiVersion;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Webhook Notification Api Version must be a string but '.\gettype($webhookNotificationApiVersion).' is given.'
        );
    }
}
