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
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
     * @return void
     */
    public function setGenderCode($genderCode)
    {
        $this->genderCode = $genderCode;
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
     * @return void
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
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
     * @return void
     */
    public function setCellPhoneNumber($cellPhoneNumber)
    {
        $this->cellPhoneNumber = $cellPhoneNumber;
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
     * @return void
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate->format('Y-m-d\TH:i:s');
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
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
}
