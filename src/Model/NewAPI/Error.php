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
 * Error Model Class
 */
class Error extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var array<mixed>|null
     */
    private $errors;

    /**
     * @var string|null
     */
    private $detail;

    /**
     * Can be either InvalidRequestError, InvalidStateError, ApiError
     *
     * @var string|null
     */
    private $errorType;

    // GETTERS & SETTERS

    /**
     * Get Type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_string($type) === true || is_null($type) === true) {
            $this->type = $type;
            return $this;
        }

        throw new InvalidArgumentException(
            'Type must be a string or null but ' . gettype($type) . ' is given.'
        );
    }

    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Title
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (is_string($title) === true || is_null($title) === true) {
            $this->title = $title;
            return $this;
        }

        throw new InvalidArgumentException(
            'Title must be a string or null but ' . gettype($title) . ' is given.'
        );
    }

    /**
     * Get Errors
     *
     * @return array<mixed>|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set Errors
     *
     * @param array<mixed>|null $errors
     *
     * @return self
     */
    public function setErrors($errors)
    {
        if (is_array($errors) === true || is_null($errors) === true) {
            $this->errors = $errors;
            return $this;
        }

        throw new InvalidArgumentException(
            'Errors must be an array or null but ' . gettype($errors) . ' is given.'
        );
    }

    /**
     * Get Detail
     *
     * @return string|null
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set Detail
     *
     * @param string|null $detail
     *
     * @return self
     */
    public function setDetail($detail)
    {
        if (is_string($detail) === true || is_null($detail) === true) {
            $this->detail = $detail;
            return $this;
        }

        throw new InvalidArgumentException(
            'Detail must be a string or null but ' . gettype($detail) . ' is given.'
        );
    }

    /**
     * Get Type
     *
     * @return string|null
     */
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * Set Type
     *
     * @param string|null $errorType
     *
     * @return self
     */
    public function setErrorType($errorType)
    {
        if (is_string($errorType) === true || is_null($errorType) === true) {
            $this->errorType = $errorType;
            return $this;
        }

        throw new InvalidArgumentException(
            'Error Type must be a string or null but ' . gettype($errorType) . ' is given.'
        );
    }
}
