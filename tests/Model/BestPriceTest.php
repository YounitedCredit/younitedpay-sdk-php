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

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use YounitedPaySDK\Model\BestPrice;

class BestPriceTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetter()
    {
        $bestPrice = new BestPrice();
        $bestPrice->setBorrowedAmount(149.99);

        $this->assertEquals(149.99, $bestPrice->getBorrowedAmount());

        $this->assertEquals(['borrowedAmount' => 149.99], $bestPrice->jsonSerialize());
    }
}
