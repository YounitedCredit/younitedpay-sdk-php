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

namespace YounitedPaySDK\Request;

use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\InitializeContract;
use YounitedPaySDK\Response\InitializeContractResponse;

/**
 * Initialize Contract Request Class
 */
class InitializeContractRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $requestTarget = '/Contract';

    /**
     * @var string
     */
    protected $method = 'POST';

    /** @var string */
    protected $response = InitializeContractResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof InitializeContract) {
            return parent::setModel($body);
        }

        throw new \InvalidArgumentException(
            'Body must be an instance of ' .  InitializeContract::class . ' ' . get_class($body) . ' given.'
        );
    }
}
