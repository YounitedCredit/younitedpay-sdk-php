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
     * @return void
     */
    public function setOnCanceledWebhookUrl($onCanceledWebhookUrl)
    {
        $this->onCanceledWebhookUrl = $onCanceledWebhookUrl;
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
     * @return void
     */
    public function setOnWithdrawnWebhookUrl($onWithdrawnWebhookUrl)
    {
        $this->onWithdrawnWebhookUrl = $onWithdrawnWebhookUrl;
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
     * @return void
     */
    public function setOnApplicationSucceededRedirectUrl($onApplicationSucceededRedirectUrl)
    {
        $this->onApplicationSucceededRedirectUrl = $onApplicationSucceededRedirectUrl;
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
     * @return void
     */
    public function setOnApplicationFailedRedirectUrl($onApplicationFailedRedirectUrl)
    {
        $this->onApplicationFailedRedirectUrl = $onApplicationFailedRedirectUrl;
    }
}
