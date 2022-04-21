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
 * Basket Model Class
 */
class Basket extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var double
     */
    private $basketAmount;

    /**
     * @var array<BasketItem|AbstractModel>
     */
    private $items;

    // GETTERS & SETTERS

    /**
     * Get Basket Amount
     *
     * @return double
     */
    public function getBasketAmount()
    {
        return $this->basketAmount;
    }

    /**
     * Set Basket Amount
     * Value must be greater than or equal to 1
     *
     * @param double $basketAmount
     *
     * @return self
     */
    public function setBasketAmount($basketAmount)
    {
        if (is_double($basketAmount)) {
            $this->basketAmount = $basketAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Basket Amount must be a double but ' . gettype($basketAmount) . ' is given.'
        );
    }

    /**
     * Get Items
     *
     * @return array<BasketItem|AbstractModel>
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set Items
     *
     * @param array<BasketItem|AbstractModel> $items
     *
     * @return self
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            if (($item instanceof BasketItem) === false) {
                throw new InvalidArgumentException(
                    'Element of Items must be an instance of ' . BasketItem::class . ' but ' . get_class($item) . ' is given.'
                );
            }
        }

        $this->items = $items;
        return $this;
    }
}
