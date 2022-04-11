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

class ConfirmContract extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $contractReference;

    /**
     * @var string|null
     */
    private $merchantOrderId = null;

    // GETTERS & SETTERS

    /**
     * Get Contract Reference
     *
     * @return string
     */
    public function getContractReference()
    {
        return $this->contractReference;
    }

    /**
     * Set Contract Reference
     *
     * @param string $contractReference
     *
     * @return void
     */
    public function setContractReference($contractReference)
    {
        $this->contractReference = $contractReference;
    }

    /**
     * Get Merchant Internal Order Id
     *
     * @return string|null
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * Set Merchant Internal Order Id
     *
     * @param string|null $merchantOrderId
     *
     * @return void
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
    }
}
