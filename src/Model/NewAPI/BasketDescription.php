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
 * Basket Description Model Class
 */
class BasketDescription extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var array<BasketDescriptionItem|AbstractModel>
     */
    private $items;

    // GETTERS & SETTERS

    /**
     * Get Items
     *
     * @return array<BasketDescriptionItem|AbstractModel>
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set Items
     *
     * @param array<BasketDescriptionItem|AbstractModel> $items
     *
     * @return self
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            if (($item instanceof BasketDescriptionItem) === false) {
                throw new InvalidArgumentException(
                    'Element of Items must be an instance of ' . BasketDescriptionItem::class . ' but ' . get_class($item) . ' is given.'
                );
            }
        }

        $this->items = $items;
        return $this;
    }
}
