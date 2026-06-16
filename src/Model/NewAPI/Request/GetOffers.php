<?php

declare(strict_types=1);

/*
 *     NOTICE OF LICENSE
 *
 *     This source file is subject to the Open Software License (OSL 3.0)
 *     PHP version 5.6+
 *
 *     @category  YounitedpaySDK
 *     @package   Ecommerceyounitedpaysdk
 *     @author    202-ecommerce <tech@202-ecommerce.com>
 *     @copyright 2022 (c) 202-ecommerce
 *     @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 *     @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Model\NewAPI\Request;

use YounitedPaySDK\Model\AbstractModel;

/**
 * Get Offers Model Class.
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
     * @var null|string
     *                  cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     */
    private $maturityList;

    /**
     * @var null|int
     */
    private $maturityRangeMin;

    /**
     * @var null|int
     */
    private $maturityRangeStep;

    /**
     * @var null|int
     */
    private $maturityRangeMax;

    /**
     * Get Amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return (string) number_format((float) $this->amount, 2, '.', '');
    }

    /**
     * Set Amount
     * Value must be greater than or equal to 1.
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

        throw new \InvalidArgumentException(
            'Amount must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get Shop Code.
     *
     * @return string
     */
    public function getShopCode()
    {
        return $this->shopCode;
    }

    /**
     * Set Shop Code.
     *
     * @param string $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (true === \is_string($shopCode)) {
            $this->shopCode = $shopCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Shop Code must be a string but '.\gettype($shopCode).' is given.'
        );
    }

    /**
     * Get Maturity List.
     *
     * @return null|string
     */
    public function getMaturityList()
    {
        return $this->maturityList;
    }

    /**
     * Set Maturity List.
     *
     * @param string $maturityList
     *
     * @return self
     */
    public function setMaturityList($maturityList)
    {
        if (true === \is_string($maturityList)) {
            $this->maturityList = $maturityList;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity List must be a string but '.\gettype($maturityList).' is given.'
        );
    }

    /**
     * Get Maturity Range Min.
     *
     * @return null|int
     */
    public function getMaturityRangeMin()
    {
        return $this->maturityRangeMin;
    }

    /**
     * Set Maturity Range Min.
     *
     * @param int $maturityRangeMin
     *
     * @return self
     */
    public function setMaturityRangeMin($maturityRangeMin)
    {
        if (true === \is_int($maturityRangeMin) || (null === $maturityRangeMin) === true) {
            $this->maturityRangeMin = $maturityRangeMin;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity Range Min must be a integer but '.\gettype($maturityRangeMin).' is given.'
        );
    }

    /**
     * Get Maturity Range Step.
     *
     * @return null|int
     */
    public function getMaturityRangeStep()
    {
        return $this->maturityRangeStep;
    }

    /**
     * Set Maturity Range Step.
     *
     * @param null|int $maturityRangeStep
     *
     * @return self
     */
    public function setMaturityRangeStep($maturityRangeStep)
    {
        if (true === \is_int($maturityRangeStep) || (null === $maturityRangeStep) === true) {
            $this->maturityRangeStep = $maturityRangeStep;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity Range Step must be a integer but '.\gettype($maturityRangeStep).' is given.'
        );
    }

    /**
     * Get Maturity Range Max.
     *
     * @return null|int
     */
    public function getMaturityRangeMax()
    {
        return $this->maturityRangeMax;
    }

    /**
     * Set Maturity Range Max.
     *
     * @param null|int $maturityRangeMax
     *
     * @return self
     */
    public function setMaturityRangeMax($maturityRangeMax)
    {
        if (true === \is_int($maturityRangeMax) || (null === $maturityRangeMax) === true) {
            $this->maturityRangeMax = $maturityRangeMax;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity Range Max must be a integer but '.\gettype($maturityRangeMax).' is given.'
        );
    }
}
