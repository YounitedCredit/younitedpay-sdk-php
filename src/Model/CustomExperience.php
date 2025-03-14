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
 * Custom Experience Model Class
 */
class CustomExperience extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string|null
     */
    private $customerRedirectUrl;

    // GETTERS & SETTERS

    /**
     * Get Customer Redirect Url
     *
     * @return string|null
     */
    public function getCustomerRedirectUrl()
    {
        return $this->customerRedirectUrl;
    }

    /**
     * Set Customer Redirect Url
     *
     * @param string|null $customerRedirectUrl
     *
     * @return self
     */
    public function setCustomerRedirectUrl($customerRedirectUrl)
    {
        if (is_string($customerRedirectUrl) === true || is_null($customerRedirectUrl) === true) {
            $this->customerRedirectUrl = $customerRedirectUrl;
            return $this;
        }

        throw new InvalidArgumentException(
            'Customer Redirect Url must be a string or null but ' . gettype($customerRedirectUrl) . ' is given.'
        );
    }
}
