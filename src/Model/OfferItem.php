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

namespace Tot\YounitedPaySDK\Model;

use JsonSerializable;

/**
 * Offer
 */
class OfferItem extends AbstractModel implements JsonSerializable
{
    /**
     * @var float
     */
    private $requestedAmount;

    /**
     * @var float
     */
    private $annualPercentageRate;

    /**
     * @var float
     */
    private $annualDebitRate;

    /**
     * @var float
     */
    private $monthlyInstallmentAmount;

    /**
     * @var float
     */
    private $creditTotalAmount;

    /**
     * @var float
     */
    private $creditAmountToFund;

    /**
     * @var int
     */
    private $maturityInMonths;

    /**
     * @var float
     */
    private $interestsTotalAmount;

    /**
     * Get requestedAmount
     *
     * @return float requestedAmount
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * Set requestedAmount
     *
     * @param float $requestedAmount
     *
     * @return self
     */
    public function setRequestedAmount($requestedAmount)
    {
        $this->requestedAmount = $requestedAmount;

        return $this;
    }

    /**
     * Get annualDebitRate
     *
     * @return float annualDebitRate
     */
    public function getAnnualDebitRate()
    {
        return $this->annualDebitRate;
    }

    /**
     * Set annualDebitRate
     *
     * @param float $annualDebitRate
     *
     * @return self
     */
    public function setAnnualDebitRate($annualDebitRate)
    {
        $this->annualDebitRate = $annualDebitRate;

        return $this;
    }
    /**
     * get AnnualPercentageRate
     *
     * @return float
     */
    public function getAnnualPercentageRate()
    {
        return $this->annualPercentageRate;
    }

    /**
     * Set annualPercentageRate
     *
     * @param float $annualPercentageRate
     *
     * @return self
     */
    public function setAnnualPercentageRate($annualPercentageRate)
    {
        $this->annualPercentageRate = $annualPercentageRate;

        return $this;
    }

    /**
     * Get creditAmountToFund
     *
     * @return float creditAmountToFund
     */
    public function getCreditAmountToFund()
    {
        return $this->creditAmountToFund;
    }

    /**
     * Set creditAmountToFund
     *
     * @param float $creditAmountToFund
     *
     * @return self
     */
    public function setCreditAmountToFund($creditAmountToFund)
    {
        $this->creditAmountToFund = $creditAmountToFund;

        return $this;
    }

    /**
     * Get monthlyInstallmentAmount
     *
     * @return float monthlyInstallmentAmount
     */
    public function getMonthlyInstallmentAmount()
    {
        return $this->monthlyInstallmentAmount;
    }

    /**
     * Set monthlyInstallmentAmount
     *
     * @param float $monthlyInstallmentAmount
     *
     * @return self
     */
    public function setMonthlyInstallmentAmount($monthlyInstallmentAmount)
    {
        $this->monthlyInstallmentAmount = $monthlyInstallmentAmount;

        return $this;
    }

    /**
     * Get creditTotalAmount
     *
     * @return float creditTotalAmount
     */
    public function getCreditTotalAmount()
    {
        return $this->creditTotalAmount;
    }

    /**
     * Set creditTotalAmount
     *
     * @param float $creditTotalAmount
     *
     * @return self
     */
    public function setCreditTotalAmount($creditTotalAmount)
    {
        $this->creditTotalAmount = $creditTotalAmount;

        return $this;
    }

    /**
     * Get maturityInMonths
     *
     * @return int maturityInMonths
     */
    public function maturityInMonthsmaturityInMonths()
    {
        return $this->maturityInMonths;
    }

    /**
     * Set maturityInMonths
     *
     * @param int $maturityInMonths
     *
     * @return self
     */
    public function setMaturityInMonths($maturityInMonths)
    {
        $this->maturityInMonths = $maturityInMonths;

        return $this;
    }

    /**
     * Get interestsTotalAmount
     *
     * @return float interestsTotalAmount
     */
    public function getInterestsTotalAmount()
    {
        return $this->interestsTotalAmount;
    }

    /**
     * Set interestsTotalAmount
     *
     * @param float $interestsTotalAmount
     *
     * @return self
     */
    public function setInterestsTotalAmount($interestsTotalAmount)
    {
        $this->interestsTotalAmount = $interestsTotalAmount;

        return $this;
    }
}
