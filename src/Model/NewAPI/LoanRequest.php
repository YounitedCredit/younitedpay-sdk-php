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

namespace YounitedPaySDK\Model\NewAPI;

use InvalidArgumentException;
use JsonSerializable;
use YounitedPaySDK\Model\AbstractModel;

/**
 * Loan Request Model Class
 */
class LoanRequest extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var double|float
     */
    private $requestedAmount;

    /**
     * @var int
     */
    private $requestedMaturityInMonths;

    // GETTERS & SETTERS

    /**
     * Get Requested Amount
     *
     * @return double|float
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * Set Requested Amount
     * Value must be greater than or equal to 1
     *
     * @param double $requestedAmount
     *
     * @return self
     */
    public function setRequestedAmount($requestedAmount)
    {
        if (is_double($requestedAmount) || is_float($requestedAmount)) {
            $this->requestedAmount = $requestedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Requested Amount must be a double but ' . gettype($requestedAmount) . ' is given.'
        );
    }

    /**
     * Get Requested Maturity In Months
     *
     * @return int
     */
    public function getRequestedMaturityInMonths()
    {
        return $this->requestedMaturityInMonths;
    }

    /**
     * Set Requested Maturity In Months
     * Value must be greater than or equal to 1
     *
     * @param int $requestedMaturityInMonths
     *
     * @return self
     */
    public function setRequestedMaturityInMonths($requestedMaturityInMonths)
    {
        if (is_int($requestedMaturityInMonths) === true) {
            $this->requestedMaturityInMonths = $requestedMaturityInMonths;
            return $this;
        }

        throw new InvalidArgumentException(
            'Requested Maturity In Months must be an int but ' . gettype($requestedMaturityInMonths) . ' is given.'
        );
    }
}
