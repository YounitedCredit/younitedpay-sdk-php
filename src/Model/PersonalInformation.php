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

use DateTime;
use InvalidArgumentException;
use JsonSerializable;

/**
 * Personnel Information Model Class
 */
class PersonalInformation extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $genderCode;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var string
     */
    private $cellPhoneNumber;

    /**
     * @var string
     */
    private $birthDate;

    /**
     * @var Address
     */
    private $address;

    // GETTERS & SETTERS

    /**
     * Get First Name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set First Name
     *
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        if (is_string($firstName) === true) {
            $this->firstName = $firstName;
            return $this;
        }

        throw new InvalidArgumentException(
            'First Name must be a string but ' . gettype($firstName) . ' is given.'
        );
    }

    /**
     * Get Last Name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set Last Name
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        if (is_string($lastName) === true) {
            $this->lastName = $lastName;
            return $this;
        }

        throw new InvalidArgumentException(
            'Last Name must be a string but ' . gettype($lastName) . ' is given.'
        );
    }

    /**
     * Get Gender Code
     *
     * @return string
     */
    public function getGenderCode()
    {
        return $this->genderCode;
    }

    /**
     * Set Gender Code
     *
     * @param string $genderCode
     *
     * @return self
     */
    public function setGenderCode($genderCode)
    {
        if (is_string($genderCode) === true) {
            $this->genderCode = $genderCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Gender Code must be a string but ' . gettype($genderCode) . ' is given.'
        );
    }

    /**
     * Get Email Address
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set Email Address
     *
     * @param string $emailAddress
     *
     * @return self
     */
    public function setEmailAddress($emailAddress)
    {
        if (is_string($emailAddress) === true) {
            $this->emailAddress = $emailAddress;
            return $this;
        }

        throw new InvalidArgumentException(
            'Email Address must be a string but ' . gettype($emailAddress) . ' is given.'
        );
    }

    /**
     * Get Cell Phone Number
     *
     * @return string
     */
    public function getCellPhoneNumber()
    {
        return $this->cellPhoneNumber;
    }

    /**
     * Set Cell Phone Number
     *
     * @param string $cellPhoneNumber
     *
     * @return self
     */
    public function setCellPhoneNumber($cellPhoneNumber)
    {
        if (is_string($cellPhoneNumber) === true) {
            $this->cellPhoneNumber = $cellPhoneNumber;
            return $this;
        }

        throw new InvalidArgumentException(
            'Cell Phone Number must be a string but ' . gettype($cellPhoneNumber) . ' is given.'
        );
    }

    /**
     * Get Birth Date
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set Birth Date
     *
     * @param DateTime $birthDate
     *
     * @return self
     */
    public function setBirthDate($birthDate)
    {
        if ($birthDate instanceof DateTime) {
            $this->birthDate = $birthDate->format('Y-m-d\TH:i:s');
            return $this;
        }

        throw new InvalidArgumentException(
            'Birth Date must be an instance of ' .  DateTime::class . ' but ' . get_class($birthDate) . ' is given.'
        );
    }

    /**
     * Get Address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set Address
     *
     * @param Address $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        if ($address instanceof Address) {
            $this->address = $address;
            return $this;
        }

        throw new InvalidArgumentException(
            'Address must be an instance of ' .  Address::class . ' but ' . get_class($address) . ' is given.'
        );
    }
}
