<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 *
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 *
 * @see      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Webhook;

use InvalidArgumentException;
use YounitedPaySDK\Client;
use YounitedPaySDK\Model\Webhook\EventNotification;
use YounitedPaySDK\Model\Webhook\EventNotificationData;
use YounitedPaySDK\Response\CallbackResponse;

class Webhook
{
    /**
     * @var EventNotification|null
     */
    private $eventNotification;

    /**
     * @var CallbackResponse|null
     */
    private $errorResponse;

    public function __construct($clientSecret)
    {
        $this->errorResponse = null;

        /** @var CallbackResponse $response */
        $response = (new Client())
            ->setCredential('', $clientSecret)
            ->retrieveCallbackResponse(false);

        if ($response->getStatusCode() === 401) {
            $this->errorResponse = $response->withStatus(401, $response->getReasonPhrase());
            return $this;
        }

        if (false === empty($response->getBody())) {
            $content = json_decode((string) $response->getBody(), true);

            if (JSON_ERROR_NONE !== json_last_error()) {
                $this->errorResponse = $response->withStatus(400, 'Unable to decode content');
                return $this;
            }
        }

        if (empty($content) === true) {
            $this->eventNotification = null;
        } else {
            $eventNotificationData = new EventNotificationData();
            if (isset($content['data'])) {
                $eventNotificationData->hydrate($content['data']);
                unset($content['data']);
            }

            $this->eventNotification = (new EventNotification())
                ->setData($eventNotificationData)
                ->hydrate($content);
        }
    }

    public function getEventNotification()
    {
        return $this->eventNotification;
    }

    /**
     * Return if error or false
     * 
     * @return string|bool error or false
     */
    public function getErrorResponse()
    {
        if ($this->errorResponse === null) {
            return false;
        }
        return $this->errorResponse->getStatusCode() . ' - '. $this->errorResponse->getReasonPhrase();
    }
}
