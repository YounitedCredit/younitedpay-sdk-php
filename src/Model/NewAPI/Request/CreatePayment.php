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
use YounitedPaySDK\Model\NewAPI\BasketDescription;
use YounitedPaySDK\Model\NewAPI\CustomerInformation;
use YounitedPaySDK\Model\NewAPI\CustomExperience;
use YounitedPaySDK\Model\NewAPI\MerchantContext;
use YounitedPaySDK\Model\NewAPI\RiskInsights;
use YounitedPaySDK\Model\NewAPI\TechnicalInformation;

/**
 * Create Payment Model Class.
 */
class CreatePayment extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var BasketDescription
     */
    private $basketDescription;

    /**
     * @var MerchantContext
     */
    private $merchantContext;

    /**
     * @var TechnicalInformation
     */
    private $technicalInformation;

    /**
     * @var null|CustomerInformation
     */
    private $customerInformation;

    /**
     * @var null|RiskInsights
     */
    private $riskInsights;

    /**
     * @var null|CustomExperience
     */
    private $customExperience;

    /**
     * @var null|string
     */
    private $paymentType;

    /**
     * @var null|string
     */
    private $purchaseAmount;

    /**
     * @var null|int
     */
    private $installmentCount;

    // GETTERS & SETTERS

    /**
     * Get Basket Description.
     *
     * @return BasketDescription
     */
    public function getBasketDescription()
    {
        return $this->basketDescription;
    }

    /**
     * Set Basket Description.
     *
     * @param BasketDescription $basketDescription
     *
     * @return self
     */
    public function setBasketDescription($basketDescription)
    {
        if ($basketDescription instanceof BasketDescription) {
            $this->basketDescription = $basketDescription;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Basket Description must be an instance of '.BasketDescription::class.' but '.\get_class($basketDescription).' is given.'
        );
    }

    /**
     * Get Merchant Context.
     *
     * @return MerchantContext
     */
    public function getMerchantContext()
    {
        return $this->merchantContext;
    }

    /**
     * Set Merchant Context.
     *
     * @param MerchantContext $merchantContext
     *
     * @return self
     */
    public function setMerchantContext($merchantContext)
    {
        if ($merchantContext instanceof MerchantContext) {
            $this->merchantContext = $merchantContext;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Merchant Context must be an instance of '.MerchantContext::class.' but '.\get_class($merchantContext).' is given.'
        );
    }

    /**
     * Get Technical Information.
     *
     * @return TechnicalInformation
     */
    public function getTechnicalInformation()
    {
        return $this->technicalInformation;
    }

    /**
     * Set Technical Information.
     *
     * @param TechnicalInformation $technicalInformation
     *
     * @return self
     */
    public function setTechnicalInformation($technicalInformation)
    {
        if ($technicalInformation instanceof TechnicalInformation) {
            $this->technicalInformation = $technicalInformation;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Technical Information must be an instance of '.TechnicalInformation::class.' but '.\get_class($technicalInformation).' is given.'
        );
    }

    /**
     * Get Customer Information.
     *
     * @return null|CustomerInformation
     */
    public function getCustomerInformation()
    {
        return $this->customerInformation;
    }

    /**
     * Set Customer Information.
     *
     * @param CustomerInformation $customerInformation
     *
     * @return self
     */
    public function setCustomerInformation($customerInformation)
    {
        if ($customerInformation instanceof CustomerInformation) {
            $this->customerInformation = $customerInformation;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Customer Information must be an instance of '.CustomerInformation::class.' but '.\get_class($customerInformation).' is given.'
        );
    }

    /**
     * Get Risk Insights.
     *
     * @return null|RiskInsights
     */
    public function getRiskInsights()
    {
        return $this->riskInsights;
    }

    /**
     * Set Risk Insights.
     *
     * @param RiskInsights $riskInsights
     *
     * @return self
     */
    public function setRiskInsights($riskInsights)
    {
        if ($riskInsights instanceof RiskInsights) {
            $this->riskInsights = $riskInsights;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Risk Insights must be an instance of '.RiskInsights::class.' but '.\get_class($riskInsights).' is given.'
        );
    }

    /**
     * Get Custom Experience.
     *
     * @return null|CustomExperience
     */
    public function getCustomExperience()
    {
        return $this->customExperience;
    }

    /**
     * Set Custom Experience.
     *
     * @param CustomExperience $customExperience
     *
     * @return self
     */
    public function setCustomExperience($customExperience)
    {
        if ($customExperience instanceof CustomExperience) {
            $this->customExperience = $customExperience;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Custom Experience must be an instance of '.CustomExperience::class.' but '.\get_class($customExperience).' is given.'
        );
    }

    /**
     * Get the value of paymentType.
     *
     * @return null|string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set the value of paymentType.
     *
     * @param null|string $paymentType
     *
     * @return self
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Get the value of purchaseAmount.
     *
     * @return null|string
     */
    public function getPurchaseAmount()
    {
        return $this->purchaseAmount;
    }

    /**
     * Set the value of purchaseAmount.
     *
     * @param null|string $purchaseAmount
     *
     * @return self
     */
    public function setPurchaseAmount($purchaseAmount)
    {
        $this->purchaseAmount = $purchaseAmount;

        return $this;
    }

    /**
     * Get the value of installmentCount.
     *
     * @return null|int
     */
    public function getInstallmentCount()
    {
        return $this->installmentCount;
    }

    /**
     * Set the value of installmentCount.
     *
     * @param null|int $installmentCount
     *
     * @return self
     */
    public function setInstallmentCount($installmentCount)
    {
        $this->installmentCount = $installmentCount;

        return $this;
    }
}
