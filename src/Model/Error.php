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
     * @var null|int
     */
    private $status;

    /**
     * @var null|string
     */
    private $detail;

    /**
     * @var null|string
     */
    private $instance;

    /**
     * @var null|array<mixed>
     */
    private $errors;

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
     * Get Status.
     *
     * @return null|int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Status.
     *
     * @param null|int $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (true === \is_int($status) || (null === $status) === true) {
            $this->status = $status;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Status must be an integer or null but '.\gettype($status).' is given.'
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
     * Get Instance.
     *
     * @return null|string
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * Set Instance.
     *
     * @param null|string $instance
     *
     * @return self
     */
    public function setInstance($instance)
    {
        if (true === \is_string($instance) || (null === $instance) === true) {
            $this->instance = $instance;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Instance must be a string or null but '.\gettype($instance).' is given.'
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
}
