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
 * Risk Insights Model Class
 */
class RiskInsights extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string|null
     */
    private $customerSegmentationCode;

    /**
     * @var string|null
     */
    private $customerIpAddress;

    // GETTERS & SETTERS

    /**
     * Get Customer Segmentation Code
     *
     * @return string|null
     */
    public function getCustomerSegmentationCode()
    {
        return $this->customerSegmentationCode;
    }

    /**
     * Set Customer Segmentation Code
     *
     * @param string|null $customerSegmentationCode
     *
     * @return self
     */
    public function setCustomerSegmentationCode($customerSegmentationCode)
    {
        if (is_string($customerSegmentationCode) === true || is_null($customerSegmentationCode) === true) {
            $this->customerSegmentationCode = $customerSegmentationCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Customer Segmentation Code must be a string or null but ' . gettype($customerSegmentationCode) . ' is given.'
        );
    }

    /**
     * Get Customer Ip Address
     *
     * @return string|null
     */
    public function getCustomerIpAddress(): string
    {
        return $this->customerIpAddress;
    }

    /**
     * Set Customer Ip Address
     *
     * @param string|null $customerIpAddress
     *
     * @return self
     */
    public function setCustomerIpAddress(string $customerIpAddress): TechnicalInformation
    {
        if (is_string($customerIpAddress) === true || is_null($customerIpAddress) === true) {
            $this->customerIpAddress = $customerIpAddress;
            return $this;
        }

        throw new InvalidArgumentException(
            'Customer Ip Address must be a string or null but ' . gettype($customerIpAddress) . ' is given.'
        );
    }
}
