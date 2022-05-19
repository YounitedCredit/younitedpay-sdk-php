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

namespace Tests\Request;

use PHPUnit\Framework\TestCase;
use YounitedPaySDK\Request\BestPriceRequest;
use YounitedPaySDK\Model\OfferItem;
use YounitedPaySDK\Model\BestPrice;

class BestPriceRequestTest extends TestCase
{
    /**
     * Test of BestPrice API with a bad Model.
     * @expectedException \InvalidArgumentException
     *
     * @return void
     */
    public function testModelKO(): void
    {
        $body = new OfferItem();
        $request = new BestPriceRequest();

        $this->expectException(\InvalidArgumentException::class);
        $request->setModel($body);
    }

    /**
     * Test of BestPrice API with a Model.
     * @expectedException \InvalidArgumentException
     *
     * @return void
     */
    public function testModelOK(): void
    {
        $body = new BestPrice();
        $body->setBorrowedAmount(149.90);

        $request = new BestPriceRequest();
        $request = $request->setModel($body);
        $this->assertEquals('https://api.younited-pay.com/api/1.0/BestPrice', (string) $request->getUri());

        $request = $request->enableSandbox();
        $this->assertEquals('https://api.sandbox-younited-pay.com/api/1.0/BestPrice', (string) $request->getUri());
    }
}
