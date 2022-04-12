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
 * Merchant Urls Model Class
 */
class MerchantUrls extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $onCanceledWebhookUrl;

    /**
     * @var string
     */
    private $onWithdrawnWebhookUrl;

    /**
     * @var string
     */
    private $onApplicationSucceededRedirectUrl;

    /**
     * @var string
     */
    private $onApplicationFailedRedirectUrl;

    // GETTERS & SETTERS

    /**
     * Get webhook url on canceled contract
     *
     * @return string
     */
    public function getOnCanceledWebhookUrl()
    {
        return $this->onCanceledWebhookUrl;
    }

    /**
     * Set webhook url on canceled contract
     *
     * @param string $onCanceledWebhookUrl
     *
     * @return self
     */
    public function setOnCanceledWebhookUrl($onCanceledWebhookUrl)
    {
        if (is_string($onCanceledWebhookUrl)) {
            $this->onCanceledWebhookUrl = $onCanceledWebhookUrl;
            return $this;
        }

        throw new InvalidArgumentException(
            'On Canceled Webhook Url must be a string but ' . gettype($onCanceledWebhookUrl) . ' is given.'
        );
    }

    /**
     * Get webhook url on withdrawn contract
     *
     * @return string
     */
    public function getOnWithdrawnWebhookUrl()
    {
        return $this->onWithdrawnWebhookUrl;
    }

    /**
     * Set webhook url on withdrawn contract
     *
     * @param string $onWithdrawnWebhookUrl
     *
     * @return self
     */
    public function setOnWithdrawnWebhookUrl($onWithdrawnWebhookUrl)
    {
        if (is_string($onWithdrawnWebhookUrl)) {
            $this->onWithdrawnWebhookUrl = $onWithdrawnWebhookUrl;
            return $this;
        }

        throw new InvalidArgumentException(
            'On Withdrawn Webhook Url must be a string but ' . gettype($onWithdrawnWebhookUrl) . ' is given.'
        );
    }

    /**
     * Get redirect url on application succeeded
     *
     * @return string
     */
    public function getOnApplicationSucceededRedirectUrl()
    {
        return $this->onApplicationSucceededRedirectUrl;
    }

    /**
     * Set redirect url on application succeeded
     *
     * @param string $onApplicationSucceededRedirectUrl
     *
     * @return self
     */
    public function setOnApplicationSucceededRedirectUrl($onApplicationSucceededRedirectUrl)
    {
        if (is_string($onApplicationSucceededRedirectUrl)) {
            $this->onApplicationSucceededRedirectUrl = $onApplicationSucceededRedirectUrl;
            return $this;
        }

        throw new InvalidArgumentException(
            'On Application Succeeded Redirect Url must be a string but ' . gettype($onApplicationSucceededRedirectUrl) . ' is given.'
        );
    }

    /**
     * Get redirect url on application failed
     *
     * @return string
     */
    public function getOnApplicationFailedRedirectUrl()
    {
        return $this->onApplicationFailedRedirectUrl;
    }

    /**
     * Set redirect url on application succeeded
     *
     * @param string $onApplicationFailedRedirectUrl
     *
     * @return self
     */
    public function setOnApplicationFailedRedirectUrl($onApplicationFailedRedirectUrl)
    {
        if (is_string($onApplicationFailedRedirectUrl)) {
            $this->onApplicationFailedRedirectUrl = $onApplicationFailedRedirectUrl;
            return $this;
        }

        throw new InvalidArgumentException(
            'On Application Failed Redirect Url must be a string but ' . gettype($onApplicationFailedRedirectUrl) . ' is given.'
        );
    }
}
