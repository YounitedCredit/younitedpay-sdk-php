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

namespace YounitedPaySDK\Model\NewAPI\Request;

use YounitedPaySDK\Model\AbstractModel;

/**
 * Update Merchant Reference Model Class.
 */
class UpdateMerchantReference extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $paymentId;

    /**
     * @var string
     */
    private $merchantReference;

    // GETTERS & SETTERS

    /**
     * Get Payment Id.
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set Payment Id.
     *
     * @param string $paymentId
     *
     * @return self
     */
    public function setPaymentId($paymentId)
    {
        if (true === \is_string($paymentId)) {
            $this->paymentId = $paymentId;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Payment Id must be a string but '.\gettype($paymentId).' is given.'
        );
    }

    /**
     * Get Merchant Reference.
     *
     * @return string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * Set Merchant Reference.
     *
     * @param string $merchantReference
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (true === \is_string($merchantReference)) {
            $this->merchantReference = $merchantReference;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Merchant Reference must be a string but '.\gettype($merchantReference).' is given.'
        );
    }
}
