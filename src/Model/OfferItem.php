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
 * Offer Item Model Class
 */
class OfferItem extends AbstractModel implements JsonSerializable
{
    /**
     * @var float|string
     */
    private $requestedAmount;

    /**
     * @var float|string
     */
    private $annualPercentageRate;

    /**
     * @var float|string
     */
    private $annualDebitRate;

    /**
     * @var float|string
     */
    private $monthlyInstallmentAmount;

    /**
     * @var float|string
     */
    private $creditTotalAmount;

    /**
     * @var float|string
     */
    private $creditAmountToFund;

    /**
     * @var int
     */
    private $maturityInMonths;

    /**
     * @var float|string
     */
    private $interestsTotalAmount;

    /**
     * Get requestedAmount
     *
     * @return float|string requestedAmount
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * Set requestedAmount
     *
     * @param float|string $requestedAmount
     *
     * @return self
     */
    public function setRequestedAmount($requestedAmount)
    {
        if ((float) $requestedAmount > 1) {
            $this->requestedAmount = $requestedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Requested Amount must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get annualDebitRate
     *
     * @return float|string annualDebitRate
     */
    public function getAnnualDebitRate()
    {
        return $this->annualDebitRate;
    }

    /**
     * Set annualDebitRate
     *
     * @param float|string $annualDebitRate
     *
     * @return self
     */
    public function setAnnualDebitRate($annualDebitRate)
    {
        if ((float) $annualDebitRate > 1) {
            $this->annualDebitRate = $annualDebitRate;
            return $this;
        }

        throw new InvalidArgumentException(
            'Annual Debit Rate must be a decimal value greater than or equal to 1.'
        );
    }
    /**
     * get AnnualPercentageRate
     *
     * @return float|string
     */
    public function getAnnualPercentageRate()
    {
        return $this->annualPercentageRate;
    }

    /**
     * Set annualPercentageRate
     *
     * @param float|string $annualPercentageRate
     *
     * @return self
     */
    public function setAnnualPercentageRate($annualPercentageRate)
    {
        if ((float) $annualPercentageRate > 1) {
            $this->annualPercentageRate = $annualPercentageRate;
            return $this;
        }

        throw new InvalidArgumentException(
            'Annual Percentage Rate must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get creditAmountToFund
     *
     * @return float|string creditAmountToFund
     */
    public function getCreditAmountToFund()
    {
        return $this->creditAmountToFund;
    }

    /**
     * Set creditAmountToFund
     *
     * @param float|string $creditAmountToFund
     *
     * @return self
     */
    public function setCreditAmountToFund($creditAmountToFund)
    {
        if ((float) $creditAmountToFund > 1) {
            $this->creditAmountToFund = $creditAmountToFund;
            return $this;
        }

        throw new InvalidArgumentException(
            'Credit Amount To Fund must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get monthlyInstallmentAmount
     *
     * @return float|string monthlyInstallmentAmount
     */
    public function getMonthlyInstallmentAmount()
    {
        return $this->monthlyInstallmentAmount;
    }

    /**
     * Set monthlyInstallmentAmount
     *
     * @param float|string $monthlyInstallmentAmount
     *
     * @return self
     */
    public function setMonthlyInstallmentAmount($monthlyInstallmentAmount)
    {
        if ((float) $monthlyInstallmentAmount > 1) {
            $this->monthlyInstallmentAmount = $monthlyInstallmentAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Monthly Installment Amount must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get creditTotalAmount
     *
     * @return float|string creditTotalAmount
     */
    public function getCreditTotalAmount()
    {
        return $this->creditTotalAmount;
    }

    /**
     * Set creditTotalAmount
     *
     * @param float|string $creditTotalAmount
     *
     * @return self
     */
    public function setCreditTotalAmount($creditTotalAmount)
    {
        if ((float) $creditTotalAmount > 1) {
            $this->creditTotalAmount = $creditTotalAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Credit Total Amount must be a decimal value greater than or equal to 1.'
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
     * @return float|string interestsTotalAmount
     */
    public function getInterestsTotalAmount()
    {
        return $this->interestsTotalAmount;
    }

    /**
     * Set interestsTotalAmount
     *
     * @param float|string $interestsTotalAmount
     *
     * @return self
     */
    public function setInterestsTotalAmount($interestsTotalAmount)
    {
        if ((float) $interestsTotalAmount > 1) {
            $this->interestsTotalAmount = $interestsTotalAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Interests Total Amount must be a decimal value greater than or equal to 1.'
        );
    }
}
