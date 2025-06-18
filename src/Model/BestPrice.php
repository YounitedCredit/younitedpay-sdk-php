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

/**
 * Best Price Model
 */
class BestPrice extends AbstractModel
{
    /**
     * @var float|string
     */
    private $borrowedAmount;

    /**
     * Get a borrow amount
     *
     * @return float|string borrowed amount
     */
    public function getBorrowedAmount()
    {
        return (float) (round((int) ($this->borrowedAmount * 100), 2) / 100);
    }

    /**
     * Set a borrow amount
     * Value must be greater than or equal to 1
     *
     * @param float|string $borrowedAmount
     *
     * @return self
     */
    public function setBorrowedAmount($borrowedAmount)
    {
        if ((float) $borrowedAmount > 1) {
            $this->borrowedAmount = $borrowedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Borrowed Amount must be a decimal value greater than or equal to 1.'
        );
    }
}
