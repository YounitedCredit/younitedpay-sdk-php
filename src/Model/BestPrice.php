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
 * Best Price Model
 */
class BestPrice extends AbstractModel implements JsonSerializable
{
    /**
     * @var float
     */
    private $borrowedAmount;

    /**
     * Get a borrow amount
     *
     * @return float borrowed amount
     */
    public function getBorrowedAmount()
    {
        return $this->borrowedAmount;
    }

    /**
     * Set a borrow amount
     *
     * @param float $borrowedAmount
     *
     * @return self
     */
    public function setBorrowedAmount($borrowedAmount)
    {
        if (is_float($borrowedAmount) === true) {
            $this->borrowedAmount = $borrowedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Borrowed Amount must be a float but ' . gettype($borrowedAmount) . ' is given.'
        );
    }
}
