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

abstract class AbstractModel implements \JsonSerializable
{
    /**
     * @var array<string>
     */
    protected $ignoredProperties = [];

    /**
     * @param array<string>|string $ignoredProperties
     *
     * @return $this
     */
    public function setIgnoredProperties($ignoredProperties)
    {
        if (\is_string($ignoredProperties)) {
            $this->ignoredProperties[] = $ignoredProperties;
        } else {
            $this->ignoredProperties = $ignoredProperties;
        }

        return $this;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $getterName = get_class_methods(static::class);
        $gettableAttributes = [];
        foreach ($getterName as $value) {
            if (false === \in_array($value, $this->ignoredProperties, true) && 'get' === substr($value, 0, 3)) {
                $gettableAttributes[lcfirst(substr($value, 3, \strlen($value)))] = $this->{$value}();
            }
        }

        return $gettableAttributes;
    }

    /**
     * hydrate from array.
     *
     * @param array<mixed> $content
     *
     * @return self
     */
    public function hydrate(array $content)
    {
        $setterName = get_class_methods(static::class);
        foreach ($setterName as $value) {
            if ('set' === substr($value, 0, 3)) {
                $key = lcfirst(substr($value, 3, \strlen($value)));
                if (isset($content[$key])) {
                    $this->{$value}($content[$key]);
                }
            }
        }

        return $this;
    }
}
