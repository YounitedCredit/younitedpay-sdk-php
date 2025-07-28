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
 * Basket Description Item Model Class
 */
class BasketDescriptionItem extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var float|string
     */
    private $unitPrice;

    // GETTERS & SETTERS

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_string($name) === true) {
            $this->name = $name;
            return $this;
        }

        throw new InvalidArgumentException(
            'Name must be a string but ' . gettype($name) . ' is given.'
        );
    }

    /**
     * Get Quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set Quantity
     * Value must be greater than or equal to 1
     *
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        if (is_int($quantity) === true) {
            $this->quantity = $quantity;
            return $this;
        }

        throw new InvalidArgumentException(
            'Quantity must be an int but ' . gettype($quantity) . ' is given.'
        );
    }

    /**
     * Get Unit Price
     *
     * @return string
     */
    public function getUnitPrice()
    {
        return (string) (round((int) ((float) $this->unitPrice * 100), 2) / 100);
    }

    /**
     * Set Unit Price
     * Value must be greater than or equal to 0
     *
     * @param float|string $unitPrice
     *
     * @return self
     */
    public function setUnitPrice($unitPrice)
    {
        if ((float) $unitPrice > 0) {
            $this->unitPrice = $unitPrice;
            return $this;
        }

        throw new InvalidArgumentException(
            'Unit Price must be a decimal value greater than or equal to 0.'
        );
    }
}
