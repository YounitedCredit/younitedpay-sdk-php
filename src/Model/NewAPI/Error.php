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
 * Error Model Class.
 */
class Error extends AbstractModel implements \JsonSerializable
{
    // PROPERTIES

    /**
     * @var null|string
     */
    private $type;

    /**
     * @var null|string
     */
    private $title;

    /**
     * @var null|array<mixed>
     */
    private $errors;

    /**
     * @var null|string
     */
    private $detail;

    /**
     * Can be either InvalidRequestError, InvalidStateError, ApiError.
     *
     * @var null|string
     */
    private $errorType;

    // GETTERS & SETTERS

    /**
     * Get Type.
     *
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type.
     *
     * @param null|string $type
     *
     * @return self
     */
    public function setType($type)
    {
        if (true === \is_string($type) || (null === $type) === true) {
            $this->type = $type;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Type must be a string or null but '.\gettype($type).' is given.'
        );
    }

    /**
     * Get Title.
     *
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Title.
     *
     * @param null|string $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (true === \is_string($title) || (null === $title) === true) {
            $this->title = $title;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Title must be a string or null but '.\gettype($title).' is given.'
        );
    }

    /**
     * Get Errors.
     *
     * @return null|array<mixed>
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set Errors.
     *
     * @param null|array<mixed> $errors
     *
     * @return self
     */
    public function setErrors($errors)
    {
        if (true === \is_array($errors) || (null === $errors) === true) {
            $this->errors = $errors;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Errors must be an array or null but '.\gettype($errors).' is given.'
        );
    }

    /**
     * Get Detail.
     *
     * @return null|string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set Detail.
     *
     * @param null|string $detail
     *
     * @return self
     */
    public function setDetail($detail)
    {
        if (true === \is_string($detail) || (null === $detail) === true) {
            $this->detail = $detail;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Detail must be a string or null but '.\gettype($detail).' is given.'
        );
    }

    /**
     * Get Type.
     *
     * @return null|string
     */
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * Set Type.
     *
     * @param null|string $errorType
     *
     * @return self
     */
    public function setErrorType($errorType)
    {
        if (true === \is_string($errorType) || (null === $errorType) === true) {
            $this->errorType = $errorType;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Error Type must be a string or null but '.\gettype($errorType).' is given.'
        );
    }
}
