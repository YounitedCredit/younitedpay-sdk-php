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
 * Basket Item Model Class
 */
class BasketItem extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $itemName;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var double
     */
    private $unitPrice;

    // GETTERS & SETTERS

    /**
     * Get Item Name
     *
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set Item Name
     *
     * @param string $itemName
     *
     * @return self
     */
    public function setItemName($itemName)
    {
        if (is_string($itemName) === true) {
            $this->itemName = $itemName;
            return $this;
        }

        throw new InvalidArgumentException(
            'Item Name must be a string but ' . gettype($itemName) . ' is given.'
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
     * @return double
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set Unit Price
     * Value must be greater than or equal to 0
     *
     * @param double $unitPrice
     *
     * @return self
     */
    public function setUnitPrice($unitPrice)
    {
        if (is_double($unitPrice) === true) {
            $this->unitPrice = $unitPrice;
            return $this;
        }

        throw new InvalidArgumentException(
            'Unit Price must be a double but ' . gettype($unitPrice) . ' is given.'
        );
    }
}
