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
     * @var float
     */
    private $basketAmount;

    /**
     * @var BasketItem[]
     */
    private $items;

    // GETTERS & SETTERS

    /**
     * Get Basket Amount
     *
     * @return float
     */
    public function getBasketAmount()
    {
        return $this->basketAmount;
    }

    /**
     * Set Basket Amount
     *
     * @param float $basketAmount
     *
     * @return self
     */
    public function setBasketAmount($basketAmount)
    {
        if (is_float($basketAmount)) {
            $this->basketAmount = $basketAmount;
            return $this;
        }

        throw new InvalidArgumentException(
            'Basket Amount must be a float but ' . gettype($basketAmount) . ' is given.'
        );
    }

    /**
     * Get Items
     *
     * @return BasketItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set Items
     *
     * @param BasketItem[] $items
     *
     * @return self
     */
    public function setItems($items)
    {
        if (!is_array($items)) {
            throw new InvalidArgumentException(
                'Items must be an array but ' . gettype($items) . ' is given.'
            );
        }

        foreach ($items as $item) {
            if (!$item instanceof BasketItem) {
                throw new InvalidArgumentException(
                    'Element of Items must be an instance of ' . BasketItem::class . ' but ' . get_class($item) . ' is given.'
                );
            }
        }

        $this->items = $items;
        return $this;
    }
}
