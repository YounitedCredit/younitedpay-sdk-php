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
 * Address Model Class
 */
class Address extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string|null
     */
    private $streetNumber;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var string|null
     */
    private $additionalAddress;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $countryCode;

    // GETTERS & SETTERS

    /**
     * Get Street Number
     *
     * @return string|null
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set Street Number
     *
     * @param string|null $streetNumber
     *
     * @return self
     */
    public function setStreetNumber($streetNumber)
    {
        if (is_string($streetNumber) === true || is_null($streetNumber) === true) {
            $this->streetNumber = $streetNumber;
            return $this;
        }

        throw new InvalidArgumentException(
            'Street Number must be a string or null but ' . gettype($streetNumber) . ' is given.'
        );
    }

    /**
     * Get Street Name
     *
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set Street Name
     * Character number must be less than or equal to 38
     *
     * @param string $streetName
     *
     * @return self
     */
    public function setStreetName($streetName)
    {
        if (is_string($streetName) === true) {
            $this->streetName = $streetName;
            return $this;
        }

        throw new InvalidArgumentException(
            'Street Name must be a string but ' . gettype($streetName) . ' is given.'
        );
    }

    /**
     * Get Additional Address
     *
     * @return string|null
     */
    public function getAdditionalAddress()
    {
        return $this->additionalAddress;
    }

    /**
     * Set Additional Address
     *
     * @param string|null $additionalAddress
     *
     * @return self
     */
    public function setAdditionalAddress($additionalAddress)
    {
        if (is_null($additionalAddress) === true || is_string($additionalAddress) === true) {
            $this->additionalAddress = $additionalAddress;
            return $this;
        }

        throw new InvalidArgumentException(
            'Additional Address must be a string or null but ' . gettype($additionalAddress) . ' is given.'
        );
    }

    /**
     * Get City
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set City
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        if (is_string($city) === true) {
            $this->city = $city;
            return $this;
        }

        throw new InvalidArgumentException(
            'City must be a string but ' . gettype($city) . ' is given.'
        );
    }

    /**
     * Get Postal Code
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set Postal Code
     *
     * @param string $postalCode
     *
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        if (is_string($postalCode) === true) {
            $this->postalCode = $postalCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Postal Code must be a string but ' . gettype($postalCode) . ' is given.'
        );
    }

    /**
     * Get Country Code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set Country Code
     *
     * @param string $countryCode
     *
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        if (is_string($countryCode) === true) {
            $this->countryCode = $countryCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Country Code must be a string but ' . gettype($countryCode) . ' is given.'
        );
    }
}
