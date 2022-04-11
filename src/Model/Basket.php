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
     * @return void
     */
    public function setBasketAmount($basketAmount)
    {
        $this->basketAmount = $basketAmount;
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
     * @return void
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
}
