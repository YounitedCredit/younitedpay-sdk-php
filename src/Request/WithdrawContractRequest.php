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

use InvalidArgumentException;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\WithdrawContract;
use YounitedPaySDK\Response\WithdrawContractResponse;

/**
 * Withdraw Contract Request Class
 */
class WithdrawContractRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $requestTarget = '/Contract/{contractReference}/withdraw';

    /**
     * @var string
     */
    protected $method = 'PATCH';

    /** @var string */
    protected $response = WithdrawContractResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof WithdrawContract) {
            $this->requestTarget = str_replace(
                '{contractReference}',
                urlencode($body->getContractReference()),
                $this->requestTarget
            );
            return parent::setModel($body);
        }

        throw new InvalidArgumentException(
            'Body must be an instance of ' .  WithdrawContract::class . ' ' . get_class($body) . ' given.'
        );
    }
}
