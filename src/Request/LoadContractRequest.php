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

namespace YounitedPaySDK\Request;

use InvalidArgumentException;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\LoadContract;
use YounitedPaySDK\Response\LoadContractResponse;

/**
 * Load Contract Request Class
 */
class LoadContractRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $requestTarget = '/Contract/{contractReference}';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = LoadContractResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof LoadContract) {
            $this->requestTarget = str_replace('{contractReference}', $body->getContractReference(), $this->requestTarget);
            return parent::setModel($body);
        }

        throw new InvalidArgumentException(
            'Body must be an instance of ' . LoadContract::class . ' ' . get_class($body) . ' given.'
        );
    }
}
