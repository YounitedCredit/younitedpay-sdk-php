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

namespace YounitedPaySDK\Cache;

use YounitedPaySDK\Model\ArrayCollection;

class Registry
{
    /**
     * @var Registry Instance of this class
     */
    private static $_instance = null;

    /**
     * @var array<RegistryItem>
     */
    private $keys;

    /**
     * Get instance of this class
     *
     * @return Registry
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new Registry();
        }

        return self::$_instance;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getItem($key)
    {
        if ($this->hasItem($key) === false) {
            $this->keys[$key] = new RegistryItem($key);
        }
        return $this->keys[$key];
    }

    /**
     * @param mixed $keys
     *
     * @return ArrayCollection<mixed>
     */
    public function getItems($keys = [])
    {
        $items = new ArrayCollection();

        if (empty($keys) === true) {
            return $items;
        }

        foreach ($keys as $key) {
            $items[$key] = $this->getItem($key);
        }

        return $items;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasItem($key)
    {
        if (false === isset($this->keys)) {
            return false;
        }

        return array_key_exists($key, $this->keys);
    }

    /**
     * @return bool
     */
    public function clear()
    {
        unset($this->keys);
        $this->keys = [];
        return empty($this->keys);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function deleteItem($key)
    {
        if ($this->hasItem($key) === true) {
            unset($this->keys[$key]);
        }
        return !isset($this->keys[$key]);
    }

    /**
     * @param mixed $keys
     *
     * @return bool
     */
    public function deleteItems($keys)
    {
        if (empty($keys) === true) {
            return true;
        }

        foreach ($keys as $key) {
            if ($this->hasItem($key)) {
                unset($this->keys[$key]);
            }
        }

        return true;
    }
}
