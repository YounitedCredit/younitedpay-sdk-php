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
     * @var double
     */
    private $requestedAmount;

    /**
     * @var double
     */
    private $annualPercentageRate;

    /**
     * @var double
     */
    private $annualDebitRate;

    /**
     * @var double
     */
    private $monthlyInstallmentAmount;

    /**
     * @var double
     */
    private $creditTotalAmount;

    /**
     * @var double
     */
    private $creditAmountToFund;

    /**
     * @var int
     */
    private $maturityInMonths;

    /**
     * @var double
     */
    private $interestsTotalAmount;

    /**
     * Get requestedAmount
     *
     * @return double requestedAmount
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * Set requestedAmount
     *
     * @param double $requestedAmount
     *
     * @return self
     */
    public function setRequestedAmount($requestedAmount)
    {
        if (is_double($requestedAmount) === true) {
            $this->requestedAmount = $requestedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Requested Amount must be a double but ' . gettype($requestedAmount) . ' is given.'
        );
    }

    /**
     * Get annualDebitRate
     *
     * @return double annualDebitRate
     */
    public function getAnnualDebitRate()
    {
        return $this->annualDebitRate;
    }

    /**
     * Set annualDebitRate
     *
     * @param double $annualDebitRate
     *
     * @return self
     */
    public function setAnnualDebitRate($annualDebitRate)
    {
        if (is_double($annualDebitRate) === true) {
            $this->annualDebitRate = $annualDebitRate;
            return $this;
        }

        throw new InvalidArgumentException(
            'Annual Debit Rate must be a double but ' . gettype($annualDebitRate) . ' is given.'
        );
    }
    /**
     * get AnnualPercentageRate
     *
     * @return double
     */
    public function getAnnualPercentageRate()
    {
        return $this->annualPercentageRate;
    }

    /**
     * Set annualPercentageRate
     *
     * @param double $annualPercentageRate
     *
     * @return self
     */
    public function setAnnualPercentageRate($annualPercentageRate)
    {
        if (is_double($annualPercentageRate) === true) {
            $this->annualPercentageRate = $annualPercentageRate;
            return $this;
        }

        throw new InvalidArgumentException(
            'Annual Percentage Rate must be a double but ' . gettype($annualPercentageRate) . ' is given.'
        );
    }

    /**
     * Get creditAmountToFund
     *
     * @return double creditAmountToFund
     */
    public function getCreditAmountToFund()
    {
        return $this->creditAmountToFund;
    }

    /**
     * Set creditAmountToFund
     *
     * @param double $creditAmountToFund
     *
     * @return self
     */
    public function setCreditAmountToFund($creditAmountToFund)
    {
        if (is_double($creditAmountToFund) === true) {
            $this->creditAmountToFund = $creditAmountToFund;
            return $this;
        }

        throw new InvalidArgumentException(
            'Credit Amount To Fund must be a double but ' . gettype($creditAmountToFund) . ' is given.'
        );
    }

    /**
     * Get monthlyInstallmentAmount
     *
     * @return double monthlyInstallmentAmount
     */
    public function getMonthlyInstallmentAmount()
    {
        return $this->monthlyInstallmentAmount;
    }

    /**
     * Set monthlyInstallmentAmount
     *
     * @param double $monthlyInstallmentAmount
     *
     * @return self
     */
    public function setMonthlyInstallmentAmount($monthlyInstallmentAmount)
    {
        if (is_double($monthlyInstallmentAmount) === true) {
            $this->monthlyInstallmentAmount = $monthlyInstallmentAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Monthly Installment Amount must be a double but ' . gettype($monthlyInstallmentAmount) . ' is given.'
        );
    }

    /**
     * Get creditTotalAmount
     *
     * @return double creditTotalAmount
     */
    public function getCreditTotalAmount()
    {
        return $this->creditTotalAmount;
    }

    /**
     * Set creditTotalAmount
     *
     * @param double $creditTotalAmount
     *
     * @return self
     */
    public function setCreditTotalAmount($creditTotalAmount)
    {
        if (is_double($creditTotalAmount) === true) {
            $this->creditTotalAmount = $creditTotalAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Credit Total Amount must be a double but ' . gettype($creditTotalAmount) . ' is given.'
        );
    }

    /**
     * Get maturityInMonths
     *
     * @return int maturityInMonths
     */
    public function getMaturityInMonths()
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
        if (is_int($maturityInMonths) === true) {
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
     * @return double interestsTotalAmount
     */
    public function getInterestsTotalAmount()
    {
        return $this->interestsTotalAmount;
    }

    /**
     * Set interestsTotalAmount
     *
     * @param double $interestsTotalAmount
     *
     * @return self
     */
    public function setInterestsTotalAmount($interestsTotalAmount)
    {
        if (is_double($interestsTotalAmount) === true) {
            $this->interestsTotalAmount = $interestsTotalAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Interests Total Amount must be a double but ' . gettype($interestsTotalAmount) . ' is given.'
        );
    }
}
