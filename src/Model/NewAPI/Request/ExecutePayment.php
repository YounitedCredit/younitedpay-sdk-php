<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounitedpaysdk
 * @author    Michael Dowling and contributors to guzzlehttp/psr7
 * @author    Tobias Nyholm  and contributors to Nyholm/psr7
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Model\NewAPI\Request;

use InvalidArgumentException;
use JsonSerializable;
use YounitedPaySDK\Model\AbstractModel;

/**
 * Execute Payment Model Class
 */
class ExecutePayment extends AbstractModel implements JsonSerializable
{
    // PROPERTIES

    /**
     * @var string
     */
    private $id;

    // GETTERS & SETTERS

    /**
     * Get Id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Id
     *
     * @param string $id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_string($id) === true) {
            $this->id = $id;
            return $this;
        }

        throw new InvalidArgumentException(
            'Id must be a string but ' . gettype($id) . ' is given.'
        );
    }
}
