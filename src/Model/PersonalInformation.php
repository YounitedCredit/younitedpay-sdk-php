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
 * Personnel Information Model Class.
 */
class PersonalInformation extends AbstractModel implements \JsonSerializable
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
     * @var null|string
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
     * @var null|string
     */
    private $birthDate;

    /**
     * @var Address
     */
    private $address;

    // GETTERS & SETTERS

    /**
     * Get First Name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set First Name.
     *
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        if (true === \is_string($firstName)) {
            $this->firstName = $firstName;

            return $this;
        }

        throw new \InvalidArgumentException(
            'First Name must be a string but '.\gettype($firstName).' is given.'
        );
    }

    /**
     * Get Last Name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set Last Name.
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        if (true === \is_string($lastName)) {
            $this->lastName = $lastName;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Last Name must be a string but '.\gettype($lastName).' is given.'
        );
    }

    /**
     * Get Gender Code.
     *
     * @return null|string
     */
    public function getGenderCode()
    {
        return $this->genderCode;
    }

    /**
     * Set Gender Code
     * If not null, possible values are : 'MALE' / 'FEMALE'.
     *
     * @param null|string $genderCode
     *
     * @return self
     */
    public function setGenderCode($genderCode)
    {
        if (true === \is_string($genderCode) || (null === $genderCode) === true) {
            $this->genderCode = $genderCode;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Gender Code must be a string or null but '.\gettype($genderCode).' is given.'
        );
    }

    /**
     * Get Email Address.
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set Email Address.
     *
     * @param string $emailAddress
     *
     * @return self
     */
    public function setEmailAddress($emailAddress)
    {
        if (true === \is_string($emailAddress)) {
            $this->emailAddress = $emailAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Email Address must be a string but '.\gettype($emailAddress).' is given.'
        );
    }

    /**
     * Get Cell Phone Number.
     *
     * @return string
     */
    public function getCellPhoneNumber()
    {
        return $this->cellPhoneNumber;
    }

    /**
     * Set Cell Phone Number
     * Need to be in international format : for example +33601020304.
     *
     * @param string $cellPhoneNumber
     *
     * @return self
     */
    public function setCellPhoneNumber($cellPhoneNumber)
    {
        if (true === \is_string($cellPhoneNumber)) {
            $this->cellPhoneNumber = $cellPhoneNumber;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Cell Phone Number must be a string but '.\gettype($cellPhoneNumber).' is given.'
        );
    }

    /**
     * Get Birth Date.
     *
     * @return null|string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set Birth Date.
     *
     * @param null|\DateTime|string $birthDate
     *
     * @return self
     */
    public function setBirthDate($birthDate)
    {
        if ($birthDate instanceof \DateTime) {
            $this->birthDate = $birthDate->format('Y-m-d');

            return $this;
        }

        if (true === \is_string($birthDate) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthDate)) {
            throw new \InvalidArgumentException(
                'Birth Date must be a string in the date format Y-m-d - '.$birthDate
            );
        }

        if (true === \is_string($birthDate) || (null === $birthDate) === true) {
            $this->birthDate = $birthDate;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Birth Date must be an instance of '.\DateTime::class.' or null but '.\get_class($birthDate).' is given.'
        );
    }

    /**
     * Get Address.
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set Address.
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

        throw new \InvalidArgumentException(
            'Address must be an instance of '.Address::class.' but '.\get_class($address).' is given.'
        );
    }
}
