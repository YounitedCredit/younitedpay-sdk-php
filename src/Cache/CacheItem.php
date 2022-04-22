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

class CacheItem implements CacheItemInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \DateTimeInterface|null
     */
    private $expiration;

    /**
     * @var int|\DateInterval|null
     */
    private $time;

    /**
     * @var \DateTimeInterface
     */
    private $creation;

    /**
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
        $this->creation = new \DateTime();
    }

    /**
     * @inherit
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @inherit
     */
    public function get()
    {
        return $this->isHit() ? $this->value : null;
    }

    /**
     * @inherit
     */
    public function isHit()
    {
        return empty($this->value);
    }

    /**
     * @inherit
     */
    public function set($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @inherit
     */
    public function expiresAt($expiration)
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * @inherit
     */
    public function expiresAfter($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        $datetime = new \DateTime();

        if (is_null($this->expiration) === false) {
            if ($this->expiration->getTimestamp() < $datetime->getTimestamp()) {
                return true;
            }
        }

        $dateInterval = $datetime->diff($this->creation)->s;

        if (is_null($this->time) === false) {
            $time = is_int($this->time) ? $this->time : $this->time->s;
            if ($time < $dateInterval) {
                return true;
            }
        }

        return false;
    }
}
