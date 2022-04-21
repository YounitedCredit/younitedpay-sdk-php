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
 * Best Price Model Class
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
     * @var int|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $detail;

    /**
     * @var string|null
     */
    private $instance;

    /**
     * @var array|null
     */
    private $errors;

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
     * Get Status
     *
     * @return int|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Status
     *
     * @param int|null $status
     */
    public function setStatus($status)
    {
        if (is_int($status) === true || is_null($status) === true) {
            $this->status = $status;
            return $this;
        }

        throw new InvalidArgumentException(
            'Status must be an integer or null but ' . gettype($status) . ' is given.'
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
     * Get Instance
     *
     * @return string|null
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * Set Instance
     *
     * @param string|null $instance
     */
    public function setInstance($instance)
    {
        if (is_string($instance) === true || is_null($instance) === true) {
            $this->instance = $instance;
            return $this;
        }

        throw new InvalidArgumentException(
            'Instance must be a string or null but ' . gettype($instance) . ' is given.'
        );
    }

    /**
     * Get Errors
     *
     * @return array|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set Errors
     *
     * @param array|null $errors
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
}
