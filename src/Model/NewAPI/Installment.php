<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounitedpaysdk
 * @author    Michael Dowling and contributors to guzzlehttp/psr7
 * @author    Tobias Nyholm  and contributors to Nyholm/psr7
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedpaySdk\Model\NewAPI;

use JsonSerializable;
use YounitedPaySDK\Model\AbstractModel;
class Installment extends AbstractModel implements JsonSerializable
{
    /**
     * @var int
     */
    private $installmentNumber;

    /**
     * Due date in YYYY-MM-DD format
     *
     * @var string
     */
    private $dueDate;

    /**
     * @var float
     */
    private $loanAmount;

    /**
     * @var float
     */
    private $feeAmount;

    /**
     * @var float
     */
    private $totalAmount;

    /**
     * Get Insatallment Number
     *
     * @return int
     */
    public function getInstallmentNumber()
    {
        return $this->installmentNumber;
    }

    /**
     * Set Installment Number
     *
     * @param int $installmentNumber
     *
     * @return self
     */
    public function setInstallmentNumber(int $installmentNumber)
    {
        $this->installmentNumber = $installmentNumber;
        return $this;
    }

    /**
     * Get Due Date
     *
     * @return string
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set due date as a string in YYYY-MM-DD format.
     *
     * @param string $dueDate
     *
     * @return self
     */
    public function setDueDate(string $dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * Get Loan Amount
     *
     * @return float
     */
    public function getLoanAmount()
    {
        return $this->loanAmount;
    }

    /**
     * Set Loan Amount
     *
     * @param float $loanAmount
     *
     * @return self
     */
    public function setLoanAmount(float $loanAmount)
    {
        $this->loanAmount = $loanAmount;
        return $this;
    }

    /**
     * Get Fee Amount
     *
     * @return float
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * Set Fee Amount
     *
     * @param float $feeAmount
     *
     * @return self
     */
    public function setFeeAmount(float $feeAmount)
    {
        $this->feeAmount = $feeAmount;
        return $this;
    }

    /**
     * Get Total Amount
     *
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set Total Amount
     *
     * @param float $totalAmount
     *
     * @return self
     */
    public function setTotalAmount(float $totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }
}
