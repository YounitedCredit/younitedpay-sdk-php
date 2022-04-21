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

namespace YounitedPaySDK\Response;

use InvalidArgumentException;
use YounitedPaySDK\Model\ArrayCollection;
use YounitedPaySDK\Model\Error;
use YounitedPaySDK\Model\OfferItem;

/**
 * Best Price Response Class
 */
class BestPriceResponse extends AbstractResponse
{
    /**
     * @inherit
     */
    public function getModel()
    {
        $content = (string) $this->stream;
        if (empty($content) === true) {
            return new ArrayCollection();
        }
        $output = json_decode($content, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidArgumentException(
                'json_decode error: ' . json_last_error_msg()
            );
        }
        if (empty($output['offers']) === true) {
            return new ArrayCollection();
        }

        if ($this->getStatusCode() > 200) {
            return (new Error())->hydrate($output);
        }

        $collection = new ArrayCollection($output['offers']);
        foreach ($collection as $key => $value) {
            $collection[$key] = (new OfferItem())
                ->hydrate($value);
        }

        return $collection;
    }
}
