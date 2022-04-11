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
 * Address Model Class
 */
class Address extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $streetNumber;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var string
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
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set Street Number
     *
     * @param string $streetNumber
     *
     * @return void
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
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
     *
     * @param string $streetName
     *
     * @return void
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    /**
     * Get Additional Address
     *
     * @return string
     */
    public function getAdditionalAddress()
    {
        return $this->additionalAddress;
    }

    /**
     * Set Additional Address
     *
     * @param string $additionalAddress
     *
     * @return void
     */
    public function setAdditionalAddress($additionalAddress)
    {
        $this->additionalAddress = $additionalAddress;
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
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * @return void
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
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
     * @return void
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }
}
