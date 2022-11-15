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

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use YounitedPaySDK\Model\ArrayCollection;

class Registry implements CacheItemPoolInterface
{
    /**
     * @var ?Registry Instance of this class
     */
    private static ?Registry $_instance = null;

    /**
     * @var array<CacheItemInterface>
     */
    private array $keys;

    /**
     * Get instance of this class
     *
     * @return Registry
     */
    public static function getInstance(): Registry
    {
        if (self::$_instance === null) {
            self::$_instance = new Registry();
        }

        return self::$_instance;
    }

    /**
     * @inherit
     */
    public function getItem($key): CacheItemInterface
    {
        if ($this->hasItem($key) === false) {
            $this->keys[$key] = new RegistryItem($key);
        }
        return $this->keys[$key];
    }

    /**
     * @inherit
     *
     * @return ArrayCollection<mixed>
     */
    public function getItems(array $keys = array()): iterable
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
     * @inherit
     */
    public function hasItem($key): bool
    {
        if (false === isset($this->keys)) {
            return false;
        }

        return array_key_exists($key, $this->keys);
    }

    /**
     * @inherit
     */
    public function clear(): bool
    {
        unset($this->keys);
        $this->keys = [];
        return empty($this->keys);
    }

    /**
     * @inherit
     */
    public function deleteItem($key): bool
    {
        if ($this->hasItem($key) === true) {
            unset($this->keys[$key]);
        }
        return !isset($this->keys[$key]);
    }

    /**
     * @inherit
     */
    public function deleteItems(array $keys): bool
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

    /**
     * @inherit
     */
    public function save(CacheItemInterface $item): bool
    {
        // TODO: Implement save() method.
        return false;
    }

    /**
     * @inherit
     */
    public function saveDeferred(CacheItemInterface $item): bool
    {
        // TODO: Implement saveDeferred() method.
        return false;
    }

    /**
     * @inherit
     */
    public function commit(): bool
    {
        // TODO: Implement commit() method.
        return false;
    }
}
