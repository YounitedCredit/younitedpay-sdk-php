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

namespace Tot\YounitedPaySDK\Uri;

use Psr\Http\Message\UriInterface;

/**
 * Sandbox Uri
 */
class SandboxUri extends AbstractUri implements UriInterface
{
    /**
     * @var string $host
     */
    protected $host = 'api.sandbox-younited-pay.com';
}
