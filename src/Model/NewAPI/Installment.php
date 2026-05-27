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

    public function getInstallmentNumber(): int
    {
        return $this->installmentNumber;
    }

    public function setInstallmentNumber(int $installmentNumber): self
    {
        $this->installmentNumber = $installmentNumber;
        return $this;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    /**
     * Set due date as a string in YYYY-MM-DD format.
     */
    public function setDueDate(string $dueDate): self
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getLoanAmount(): float
    {
        return $this->loanAmount;
    }

    public function setLoanAmount(float $loanAmount): self
    {
        $this->loanAmount = $loanAmount;
        return $this;
    }

    public function getFeeAmount(): float
    {
        return $this->feeAmount;
    }

    public function setFeeAmount(float $feeAmount): self
    {
        $this->feeAmount = $feeAmount;
        return $this;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }
}