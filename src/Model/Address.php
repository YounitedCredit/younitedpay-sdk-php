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
 * Address Model Class.
 */
class Address extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var null|string
     */
    private $streetNumber;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var null|string
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
     * Get Street Number.
     *
     * @return null|string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set Street Number.
     *
     * @param null|string $streetNumber
     *
     * @return self
     */
    public function setStreetNumber($streetNumber)
    {
        if (true === \is_string($streetNumber) || (null === $streetNumber) === true) {
            $this->streetNumber = $streetNumber;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Street Number must be a string or null but '.\gettype($streetNumber).' is given.'
        );
    }

    /**
     * Get Street Name.
     *
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set Street Name
     * Character number must be less than or equal to 38.
     *
     * @param string $streetName
     *
     * @return self
     */
    public function setStreetName($streetName)
    {
        if (true === \is_string($streetName)) {
            $this->streetName = $streetName;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Street Name must be a string but '.\gettype($streetName).' is given.'
        );
    }

    /**
     * Get Additional Address.
     *
     * @return null|string
     */
    public function getAdditionalAddress()
    {
        return $this->additionalAddress;
    }

    /**
     * Set Additional Address.
     *
     * @param null|string $additionalAddress
     *
     * @return self
     */
    public function setAdditionalAddress($additionalAddress)
    {
        if ((null === $additionalAddress) === true || true === \is_string($additionalAddress)) {
            $this->additionalAddress = $additionalAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Additional Address must be a string or null but '.\gettype($additionalAddress).' is given.'
        );
    }

    /**
     * Get City.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set City.
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        if (true === \is_string($city)) {
            $this->city = $city;

            return $this;
        }

        throw new \InvalidArgumentException(
            'City must be a string but '.\gettype($city).' is given.'
        );
    }

    /**
     * Get Postal Code.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set Postal Code.
     *
     * @param string $postalCode
     *
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        if (true === \is_string($postalCode)) {
            $this->postalCode = $postalCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Postal Code must be a string but '.\gettype($postalCode).' is given.'
        );
    }

    /**
     * Get Country Code.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set Country Code.
     *
     * @param string $countryCode
     *
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        if (true === \is_string($countryCode)) {
            $this->countryCode = $countryCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Country Code must be a string but '.\gettype($countryCode).' is given.'
        );
    }
}
