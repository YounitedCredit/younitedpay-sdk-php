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

namespace YounitedPaySDK\Cache;

class RegistryItem
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var null|\DateTimeInterface
     */
    protected $expiration;

    /**
     * @var null|\DateInterval|int
     */
    protected $time;

    /**
     * @var \DateTimeInterface
     */
    protected $creation;

    /**
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
        $this->creation = new \DateTime();
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->isHit() ? $this->value : null;
    }

    /**
     * @return bool
     */
    public function isHit()
    {
        return false === empty($this->value);
    }

    /**
     * @param string $value
     *
     * @return RegistryItem
     */
    public function set($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param null|\DateTimeInterface $expiration
     *
     * @return RegistryItem
     */
    public function expiresAt($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * @param int $time
     *
     * @return RegistryItem
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

        if ((null === $this->expiration) === false) {
            if ($this->expiration->getTimestamp() < $datetime->getTimestamp()) {
                return true;
            }
        }

        $dateInterval = $datetime->diff($this->creation)->s;

        if ((null === $this->time) === false) {
            $time = \is_int($this->time) ? $this->time : $this->time->s;
            if ($time < $dateInterval) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return null|\DateTimeInterface
     */
    public function getExpiredDate()
    {
        return $this->expiration;
    }

    /**
     * @return null|\DateInterval|int
     */
    public function getExpiredTime()
    {
        return $this->time;
    }

    /**
     * @return \DateTime|\DateTimeInterface
     */
    public function getCreationDate()
    {
        return $this->creation;
    }
}
