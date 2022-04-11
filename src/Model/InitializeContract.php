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
 * Initialize Contract Model Class
 */
class InitializeContract extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var int
     */
    private $requestedMaturity;

    /**
     * @var PersonalInformation
     */
    private $personalInformation;

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @var MerchantUrls
     */
    private $merchantUrls;

    /**
     * @var MerchantOrderContext
     */
    private $merchantOrderContext;

    // GETTERS & SETTERS

    /**
     * Get Requested Maturity
     *
     * @return int
     */
    public function getRequestedMaturity()
    {
        return $this->requestedMaturity;
    }

    /**
     * Set Requested Maturity
     *
     * @param int $requestedMaturity
     *
     * @return void
     */
    public function setRequestedMaturity($requestedMaturity)
    {
        $this->requestedMaturity = $requestedMaturity;
    }

    /**
     * Get Personal Information
     *
     * @return PersonalInformation
     */
    public function getPersonalInformation()
    {
        return $this->personalInformation;
    }

    /**
     * Set Personal Information
     *
     * @param PersonalInformation $personalInformation
     *
     * @return void
     */
    public function setPersonalInformation($personalInformation)
    {
        $this->personalInformation = $personalInformation;
    }

    /**
     * Get Basket
     *
     * @return Basket
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * Set Basket
     *
     * @param Basket $basket
     *
     * @return void
     */
    public function setBasket($basket)
    {
        $this->basket = $basket;
    }

    /**
     * Get Merchant Urls
     *
     * @return MerchantUrls
     */
    public function getMerchantUrls()
    {
        return $this->merchantUrls;
    }

    /**
     * Set Merchant Urls
     *
     * @param MerchantUrls $merchantUrls
     *
     * @return void
     */
    public function setMerchantUrls($merchantUrls)
    {
        $this->merchantUrls = $merchantUrls;
    }

    /**
     * Get Merchant Order Context
     *
     * @return MerchantOrderContext
     */
    public function getMerchantOrderContext()
    {
        return $this->merchantOrderContext;
    }

    /**
     * Set Merchant Order Context
     *
     * @param MerchantOrderContext $merchantOrderContext
     *
     * @return void
     */
    public function setMerchantOrderContext($merchantOrderContext)
    {
        $this->merchantOrderContext = $merchantOrderContext;
    }
}
