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

namespace YounitedPaySDK\Model\Webhook;

use InvalidArgumentException;
use YounitedPaySDK\Model\AbstractModel;

/**
 * Event Notification Model Class
 */
class EventNotification extends AbstractModel
{
    // PROPERTIES

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $notificationId;

    /**
     * @var EventNotificationData
     */
    private $data;

    /**
     * @var string
     */
    private $createdAt;

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
     *
     * @return self
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
     * Get Notification ID
     *
     * @return string
     */
    public function getNotificationId()
    {
        return $this->notificationId;
    }

    /**
     * Set Notification ID
     *
     * @param string $notificationId
     *
     * @return self
     */
    public function setNotificationId($notificationId)
    {
        if (is_string($notificationId) === true) {
            $this->notificationId = $notificationId;

            return $this;
        }

        throw new InvalidArgumentException(
            'Notification Id must be a string but ' . gettype($notificationId) . ' is given.'
        );
    }

    /**
     * Get Data
     *
     * @return EventNotificationData
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set Data
     *
     * @param EventNotificationData $data
     *
     * @return self
     */
    public function setData($data)
    {
        if ($data instanceof EventNotificationData) {
            $this->data = $data;

            return $this;
        }

        throw new InvalidArgumentException(
            'Data must be an instance of ' . EventNotificationData::class . ' but ' . get_class($data) . ' is given.'
        );
    }

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set Created At
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        if (is_string($createdAt) === true) {
            $this->createdAt = $createdAt;

            return $this;
        }

        throw new InvalidArgumentException(
            'Created At must be a string but ' . gettype($createdAt) . ' is given.'
        );
    }
}
