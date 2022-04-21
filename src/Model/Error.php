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
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $detail;

    /**
     * @var string
     */
    private $instance;

    /**
     * @var array
     */
    private $errors;

    // GETTERS & SETTERS

    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     *
     * @param string $type
     */
    public function setType($type)
    {
        if (is_string($type) === true) {
            $this->type = $type;
            return $this;
        }

        throw new InvalidArgumentException(
            'Type must be a string but ' . gettype($type) . ' is given.'
        );
    }

    /**
     * Get Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        if (is_string($title) === true) {
            $this->title = $title;
            return $this;
        }

        throw new InvalidArgumentException(
            'Title must be a string but ' . gettype($title) . ' is given.'
        );
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        if (is_string($status) === true) {
            $this->status = $status;
            return $this;
        }

        throw new InvalidArgumentException(
            'Status must be a string but ' . gettype($status) . ' is given.'
        );
    }

    /**
     * Get Detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set Detail
     *
     * @param string $detail
     */
    public function setDetail($detail)
    {
        if (is_string($detail) === true) {
            $this->detail = $detail;
            return $this;
        }

        throw new InvalidArgumentException(
            'Detail must be a string but ' . gettype($detail) . ' is given.'
        );
    }

    /**
     * Get Instance
     *
     * @return string
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * Set Instance
     *
     * @param string $instance
     */
    public function setInstance($instance)
    {
        if (is_string($instance) === true) {
            $this->instance = $instance;
            return $this;
        }

        throw new InvalidArgumentException(
            'Instance must be a string but ' . gettype($instance) . ' is given.'
        );
    }

    /**
     * Get Errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set Errors
     *
     * @param array $errors
     */
    public function setErrors($errors)
    {
        if (is_array($errors) === true) {
            $this->errors = $errors;
            return $this;
        }

        throw new InvalidArgumentException(
            'Errors must be an array but ' . gettype($errors) . ' is given.'
        );
    }
}
