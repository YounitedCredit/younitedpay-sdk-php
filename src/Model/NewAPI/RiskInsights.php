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
 * Risk Insights Model Class.
 */
class RiskInsights extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var null|string
     */
    private $customerSegmentationCode;

    /**
     * @var null|string
     */
    private $customerIpAddress;

    // GETTERS & SETTERS

    /**
     * Get Customer Segmentation Code.
     *
     * @return null|string
     */
    public function getCustomerSegmentationCode()
    {
        return $this->customerSegmentationCode;
    }

    /**
     * Set Customer Segmentation Code.
     *
     * @param null|string $customerSegmentationCode
     *
     * @return self
     */
    public function setCustomerSegmentationCode($customerSegmentationCode)
    {
        if (true === \is_string($customerSegmentationCode) || (null === $customerSegmentationCode) === true) {
            $this->customerSegmentationCode = $customerSegmentationCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Customer Segmentation Code must be a string or null but '.\gettype($customerSegmentationCode).' is given.'
        );
    }

    /**
     * Get Customer Ip Address.
     *
     * @return null|string
     */
    public function getCustomerIpAddress()
    {
        return $this->customerIpAddress;
    }

    /**
     * Set Customer Ip Address.
     *
     * @param null|string $customerIpAddress
     *
     * @return self
     */
    public function setCustomerIpAddress($customerIpAddress)
    {
        if (true === \is_string($customerIpAddress) || (null === $customerIpAddress) === true) {
            $this->customerIpAddress = $customerIpAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Customer Ip Address must be a string or null but '.\gettype($customerIpAddress).' is given.'
        );
    }
}
