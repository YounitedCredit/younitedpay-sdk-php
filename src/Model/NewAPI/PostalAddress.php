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
 * Postal Address Model Class
 */
class PostalAddress extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $addressLine1;

    /**
     * @var string|null
     */
    private $addressLine2;

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
     * Get Address Line 1
     *
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * Set Address Line 1
     * Character number must be less than or equal to 38
     *
     * @param string $addressLine1
     *
     * @return self
     */
    public function setAddressLine1($addressLine1)
    {
        if (is_string($addressLine1) === true) {
            if (strlen($addressLine1) > 38) {
                throw new InvalidArgumentException(
                    'Character number of Address Line 1 must be less than or equal to 38.'
                );
            }

            $this->addressLine1 = $addressLine1;
            return $this;
        }

        throw new InvalidArgumentException(
            'Address Line 1 must be a string but ' . gettype($addressLine1) . ' is given.'
        );
    }

    /**
     * Get Address Line 2
     *
     * @return string|null
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * Set Address Line 2
     * Use only if AddressLine1 is greater than 38 characters.
     *
     * @param string|null $addressLine2
     *
     * @return self
     */
    public function setAddressLine2($addressLine2)
    {
        if (is_string($addressLine2) === true || is_null($addressLine2) === true) {
            $this->addressLine2 = $addressLine2;
            return $this;
        }

        throw new InvalidArgumentException(
            'Address Line 2 must be a string or null but ' . gettype($addressLine2) . ' is given.'
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
