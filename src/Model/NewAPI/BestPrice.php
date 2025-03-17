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
use YounitedPaySDK\Model\AbstractModel;

/**
 * Best Price Model
 */
class BestPrice extends AbstractModel
{
    /**
     * @var double
     */
    private $borrowedAmount;

    /**
     * @var string
     */
    private $shopCode;

    /**
     * @var mixed
     * cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     */
    private $Maturity;

    /**
     * Get a borrow amount
     *
     * @return double borrowed amount
     */
    public function getBorrowedAmount()
    {
        return $this->borrowedAmount;
    }

    /**
     * Set a borrow amount
     * Value must be greater than or equal to 1
     *
     * @param double $borrowedAmount
     *
     * @return self
     */
    public function setBorrowedAmount($borrowedAmount)
    {
        if (is_double($borrowedAmount) === true) {
            $this->borrowedAmount = $borrowedAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Borrowed Amount must be a double but ' . gettype($borrowedAmount) . ' is given.'
        );
    }

    /**
     * Get cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     *
     * @return  mixed
     */
    public function getMaturity()
    {
        if (empty($this->Maturity)) {
            return [
                'List' => "24,36"
            ];
        }
        return $this->Maturity;
    }

    /**
     * Set cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     *
     * @param   mixed  $Maturity  cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     *
     * @return  self
     */
    public function setMaturity($Maturity)
    {
        $this->Maturity = $Maturity;

        return $this;
    }

    /**
     * Get the value of shopCode
     *
     * @return  string
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set the value of shopCode
     *
     * @param   string  $shopCode  
     *
     * @return  self
     */
    public function setShopCode(string $shopCode)
    {
        $this->shopCode = $shopCode;

        return $this;
    }
}
