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

namespace YounitedPaySDK\Model\NewAPI;

use YounitedPaySDK\Model\AbstractModel;

/**
 * Customer Information Model Class.
 */
class CustomerInformation extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var null|string
     */
    private $firstName;

    /**
     * @var null|string
     */
    private $lastName;

    /**
     * @var null|string
     */
    private $emailAddress;

    /**
     * @var null|string
     */
    private $mobilePhoneNumber;

    /**
     * @var null|string
     */
    private $birthDate;

    /**
     * @var null|PostalAddress
     */
    private $postalAddress;

    // GETTERS & SETTERS

    /**
     * Get First Name.
     *
     * @return null|string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set First Name.
     *
     * @param null|string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        if (true === \is_string($firstName) || (null === $firstName) === true) {
            $this->firstName = $firstName;

            return $this;
        }

        throw new \InvalidArgumentException(
            'First Name must be a string or null but '.\gettype($firstName).' is given.'
        );
    }

    /**
     * Get Last Name.
     *
     * @return null|string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set Last Name.
     *
     * @param null|string $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        if (true === \is_string($lastName) || (null === $lastName) === true) {
            $this->lastName = $lastName;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Last Name must be a string or null but '.\gettype($lastName).' is given.'
        );
    }

    /**
     * Get Email Address.
     *
     * @return null|string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set Email Address.
     *
     * @param null|string $emailAddress
     *
     * @return self
     */
    public function setEmailAddress($emailAddress)
    {
        if (true === \is_string($emailAddress) || (null === $emailAddress) === true) {
            $this->emailAddress = $emailAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Email Address must be a string or null but '.\gettype($emailAddress).' is given.'
        );
    }

    /**
     * Get Mobile Phone Number.
     *
     * @return null|string
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    /**
     * Set Mobile Phone Number
     * Need to be in international format : for example +33601020304.
     *
     * @param null|string $mobilePhoneNumber
     *
     * @return self
     */
    public function setMobilePhoneNumber($mobilePhoneNumber)
    {
        if (true === \is_string($mobilePhoneNumber) || (null === $mobilePhoneNumber) === true) {
            $this->mobilePhoneNumber = $mobilePhoneNumber;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Mobile Phone Number must be a string or null but '.\gettype($mobilePhoneNumber).' is given.'
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
     * Get Postal Address.
     *
     * @return null|PostalAddress
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * Set Postal Address.
     *
     * @param PostalAddress $postalAddress
     *
     * @return self
     */
    public function setPostalAddress($postalAddress)
    {
        if ($postalAddress instanceof PostalAddress || (null === $postalAddress) === true) {
            $this->postalAddress = $postalAddress;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Postal Address must be an instance of '.PostalAddress::class.' or null but '.\get_class($postalAddress).' is given.'
        );
    }
}
