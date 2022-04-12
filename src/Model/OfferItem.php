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
        if (is_float($requestedAmount)) {
            $this->requestedAmount = $requestedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Requested Amount must be a float but ' . gettype($requestedAmount) . ' is given.'
        );
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
        if (is_float($annualDebitRate)) {
            $this->annualDebitRate = $annualDebitRate;
            return $this;
        }

        throw new InvalidArgumentException(
            'Annual Debit Rate must be a float but ' . gettype($annualDebitRate) . ' is given.'
        );
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
        if (is_float($annualPercentageRate)) {
            $this->annualPercentageRate = $annualPercentageRate;
            return $this;
        }

        throw new InvalidArgumentException(
            'Annual Percentage Rate must be a float but ' . gettype($annualPercentageRate) . ' is given.'
        );
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
        if (is_float($creditAmountToFund)) {
            $this->creditAmountToFund = $creditAmountToFund;
            return $this;
        }

        throw new InvalidArgumentException(
            'Credit Amount To Fund must be a float but ' . gettype($creditAmountToFund) . ' is given.'
        );
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
        if (is_float($monthlyInstallmentAmount)) {
            $this->monthlyInstallmentAmount = $monthlyInstallmentAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Monthly Installment Amount must be a float but ' . gettype($monthlyInstallmentAmount) . ' is given.'
        );
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
        if (is_float($creditTotalAmount)) {
            $this->creditTotalAmount = $creditTotalAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Credit Total Amount must be a float but ' . gettype($creditTotalAmount) . ' is given.'
        );
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
        if (is_int($maturityInMonths)) {
            $this->maturityInMonths = $maturityInMonths;
            return $this;
        }

        throw new InvalidArgumentException(
            'Maturity In Months must be an int but ' . gettype($maturityInMonths) . ' is given.'
        );
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
        if (is_float($interestsTotalAmount)) {
            $this->interestsTotalAmount = $interestsTotalAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Interests Total Amount must be a float but ' . gettype($interestsTotalAmount) . ' is given.'
        );
    }
}
