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
 * Create Payment Model Class
 */
class CreatePayment extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var LoanRequest
     */
    private $loanRequest;

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
     * @var CustomerInformation|null
     */
    private $customerInformation;

    /**
     * @var RiskInsights|null
     */
    private $riskInsights;

    /**
     * @var CustomExperience|null
     */
    private $customExperience;

    // GETTERS & SETTERS

    /**
     * Get Loan Request
     *
     * @return LoanRequest
     */
    public function getLoanRequest()
    {
        return $this->loanRequest;
    }

    /**
     * Set Loan Request
     *
     * @param LoanRequest $loanRequest
     *
     * @return self
     */
    public function setLoanRequest($loanRequest)
    {
        if ($loanRequest instanceof LoanRequest) {
            $this->loanRequest = $loanRequest;

            return $this;
        }

        throw new InvalidArgumentException(
            'Loan Request must be an instance of ' . LoanRequest::class . ' but ' . gettype($loanRequest) . ' is given.'
        );
    }

    /**
     * Get Basket Description
     *
     * @return BasketDescription
     */
    public function getBasketDescription()
    {
        return $this->basketDescription;
    }

    /**
     * Set Basket Description
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

        throw new InvalidArgumentException(
            'Basket Description must be an instance of ' . BasketDescription::class . ' but ' . get_class($basketDescription) . ' is given.'
        );
    }

    /**
     * Get Merchant Context
     *
     * @return MerchantContext
     */
    public function getMerchantContext()
    {
        return $this->merchantContext;
    }

    /**
     * Set Merchant Context
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

        throw new InvalidArgumentException(
            'Merchant Context must be an instance of ' . MerchantContext::class . ' but ' . get_class($merchantContext) . ' is given.'
        );
    }

    /**
     * Get Technical Information
     *
     * @return TechnicalInformation
     */
    public function getTechnicalInformation()
    {
        return $this->technicalInformation;
    }

    /**
     * Set Technical Information
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

        throw new InvalidArgumentException(
            'Technical Information must be an instance of ' . TechnicalInformation::class . ' but ' . get_class($technicalInformation) . ' is given.'
        );
    }

    /**
     * Get Customer Information
     *
     * @return CustomerInformation
     */
    public function getCustomerInformation()
    {
        return $this->customerInformation;
    }

    /**
     * Set Customer Information
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

        throw new InvalidArgumentException(
            'Customer Information must be an instance of ' . CustomerInformation::class . ' but ' . get_class($customerInformation) . ' is given.'
        );
    }

    /**
     * Get Risk Insights
     *
     * @return RiskInsights|null
     */
    public function getRiskInsights()
    {
        return $this->riskInsights;
    }

    /**
     * Set Risk Insights
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

        throw new InvalidArgumentException(
            'Risk Insights must be an instance of ' . RiskInsights::class . ' but ' . get_class($riskInsights) . ' is given.'
        );
    }

    /**
     * Get Custom Experience
     *
     * @return CustomExperience|null
     */
    public function getCustomExperience()
    {
        return $this->customExperience;
    }

    /**
     * Set Custom Experience
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

        throw new InvalidArgumentException(
            'Custom Experience must be an instance of ' . CustomExperience::class . ' but ' . get_class($customExperience) . ' is given.'
        );
    }
}
