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
 * Basket Model Class.
 */
class Basket extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var float|string
     */
    private $basketAmount;

    /**
     * @var array<AbstractModel|BasketItem>
     */
    private $items;

    // GETTERS & SETTERS

    /**
     * Get Basket Amount.
     *
     * @return string
     */
    public function getBasketAmount()
    {
        return (string) number_format((float) $this->basketAmount, 2, '.', '');
    }

    /**
     * Set Basket Amount
     * Value must be greater than or equal to 1.
     *
     * @param float|string $basketAmount
     *
     * @return self
     */
    public function setBasketAmount($basketAmount)
    {
        if ((float) $basketAmount > 1) {
            $this->basketAmount = $basketAmount;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Basket Amount must be a decimal value greater than or equal to 1.'
        );
    }

    /**
     * Get Items.
     *
     * @return array<AbstractModel|BasketItem>
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set Items.
     *
     * @param array<AbstractModel|BasketItem> $items
     *
     * @return self
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            if (($item instanceof BasketItem) === false) {
                throw new \InvalidArgumentException(
                    'Element of Items must be an instance of '.BasketItem::class.' but '.\get_class($item).' is given.'
                );
            }
        }

        $this->items = $items;

        return $this;
    }
}
