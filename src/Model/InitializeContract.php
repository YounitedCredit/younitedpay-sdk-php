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
     * @return self
     */
    public function setRequestedMaturity($requestedMaturity)
    {
        if (is_int($requestedMaturity)) {
            $this->requestedMaturity = $requestedMaturity;

            return $this;
        }

        throw new InvalidArgumentException(
            'Requested Maturity must be an int but ' . gettype($requestedMaturity) . ' is given.'
        );
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
     * @return self
     */
    public function setPersonalInformation($personalInformation)
    {
        if ($personalInformation instanceof PersonalInformation) {
            $this->personalInformation = $personalInformation;
            return $this;
        }

        throw new InvalidArgumentException(
            'Personal Information must be an instance of ' . PersonalInformation::class . ' but ' . get_class($personalInformation) . ' is given.'
        );
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
     * @return self
     */
    public function setBasket($basket)
    {
        if ($basket instanceof Basket) {
            $this->basket = $basket;
            return $this;
        }

        throw new InvalidArgumentException(
            'Basket must be an instance of ' . Basket::class . ' but ' . get_class($basket) . ' is given.'
        );
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
     * @return self
     */
    public function setMerchantUrls($merchantUrls)
    {
        if ($merchantUrls instanceof MerchantUrls) {
            $this->merchantUrls = $merchantUrls;
            return $this;
        }

        throw new InvalidArgumentException(
            'Merchant Urls must be an instance of ' . MerchantUrls::class . ' but ' . get_class($merchantUrls) . ' is given.'
        );
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
     * @return self
     */
    public function setMerchantOrderContext($merchantOrderContext)
    {
        if ($merchantOrderContext instanceof MerchantOrderContext) {
            $this->merchantOrderContext = $merchantOrderContext;
            return $this;
        }

        throw new InvalidArgumentException(
            'Merchant Order Context must be an instance of ' . MerchantOrderContext::class . ' but ' . get_class($merchantOrderContext) . ' is given.'
        );
    }
}
