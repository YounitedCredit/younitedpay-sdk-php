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
 * Get Offers Model Class
 */
class GetOffers extends AbstractModel
{
    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $shopCode;

    /**
     * @var string|null
     * cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     */
    private $maturityList;

    /**
     * @var int|null
     */
    private $maturityRangeMin;

    /**
     * @var int|null
     */
    private $maturityRangeStep;

    /**
     * @var int|null
     */
    private $maturityRangeMax;

    /**
     * Get Amount
     *
     * @return string
     */
    public function getAmount()
    {
        return (string) number_format($this->amount, 2, '.', '');
    }

    /**
     * Set Amount
     * Value must be greater than or equal to 1
     *
     * @param string $amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if ((float) $amount > 1) {
            $this->amount = $amount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Amount must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get Shop Code
     *
     * @return string
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set Shop Code
     *
     * @param string  $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (is_string($shopCode) === true) {
            $this->shopCode = $shopCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Shop Code must be a string but ' . gettype($shopCode) . ' is given.'
        );
    }

    /**
     * Get Maturity List
     *
     * @return string|null
     */
    public function getMaturityList()
    {
        return $this->maturityList;
    }

    /**
     * Set Maturity List
     *
     * @param string $maturityList
     *
     * @return self
     */
    public function setMaturityList($maturityList)
    {
        if (is_string($maturityList) === true) {
            $this->maturityList = $maturityList;
            return $this;
        }

        throw new InvalidArgumentException(
            'Maturity List must be a string but ' . gettype($maturityList) . ' is given.'
        );
    }

    /**
     * Get Maturity Range Min
     *
     * @return int|null
     */
    public function getMaturityRangeMin()
    {
        return $this->maturityRangeMin;
    }

    /**
     * Set Maturity Range Min
     *
     * @param int $maturityRangeMin
     *
     * @return self
     */
    public function setMaturityRangeMin($maturityRangeMin)
    {
        if (is_int($maturityRangeMin) === true || is_null($maturityRangeMin) === true) {
            $this->maturityRangeMin = $maturityRangeMin;
            return $this;
        }

        throw new InvalidArgumentException(
            'Maturity Range Min must be a integer but ' . gettype($maturityRangeMin) . ' is given.'
        );
    }

    /**
     * Get Maturity Range Step
     *
     * @return int|null
     */
    public function getMaturityRangeStep()
    {
        return $this->maturityRangeStep;
    }

    /**
     * Set Maturity Range Step
     *
     * @param int|null $maturityRangeStep
     *
     * @return self
     */
    public function setMaturityRangeStep($maturityRangeStep)
    {
        if (is_int($maturityRangeStep) === true || is_null($maturityRangeStep) === true) {
            $this->maturityRangeStep = $maturityRangeStep;
            return $this;
        }

        throw new InvalidArgumentException(
            'Maturity Range Step must be a integer but ' . gettype($maturityRangeStep) . ' is given.'
        );
    }

    /**
     * Get Maturity Range Max
     *
     * @return int|null
     */
    public function getMaturityRangeMax()
    {
        return $this->maturityRangeMax;
    }

    /**
     * Set Maturity Range Max
     *
     * @param int|null $maturityRangeMax
     *
     * @return self
     */
    public function setMaturityRangeMax($maturityRangeMax)
    {
        if (is_int($maturityRangeMax) === true || is_null($maturityRangeMax) === true) {
            $this->maturityRangeMax = $maturityRangeMax;
            return $this;
        }

        throw new InvalidArgumentException(
            'Maturity Range Max must be a integer but ' . gettype($maturityRangeMax) . ' is given.'
        );
    }
}
