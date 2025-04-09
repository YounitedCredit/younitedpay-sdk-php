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

    public function __construct($clientSecret)
    {
        /** @var CallbackResponse $response */
        $response = (new Client())
            ->setCredential('', $clientSecret)
            ->retrieveCallbackResponse();

        if ($response->getStatusCode() === 401) {
            exit('Sorry, we cannot process this request :' . $response->getReasonPhrase());
        }

        if (false === empty($response->getBody())) {
            $content = json_decode((string) $response->getBody(), true);

            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new InvalidArgumentException(
                    'json_decode error: ' . json_last_error_msg()
                );
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
}
