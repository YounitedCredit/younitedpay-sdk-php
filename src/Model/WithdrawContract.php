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

namespace YounitedPaySDK\Model;

/**
 * Withdraw Contract Model Class.
 */
class WithdrawContract extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $contractReference;

    /**
     * @var null|float|string
     */
    private $amount;

    // GETTERS & SETTERS

    /**
     * Get Contract Reference.
     *
     * @return string
     */
    public function getContractReference()
    {
        return $this->contractReference;
    }

    /**
     * Set Contract Reference.
     *
     * @param string $contractReference
     *
     * @return self
     */
    public function setContractReference($contractReference)
    {
        if (true === \is_string($contractReference)) {
            $this->contractReference = $contractReference;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Contract Reference must be a string but '.\gettype($contractReference).' is given.'
        );
    }

    /**
     * Get Amount.
     *
     * @return null|float|string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set Amount.
     *
     * @param null|float|string $amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if ((null === $amount) === true || (float) $amount > 1) {
            $this->amount = $amount;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Amount must be a decimal value or null.'
        );
    }
}
