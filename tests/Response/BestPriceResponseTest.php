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

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use YounitedPaySDK\Request\BestPriceRequest;
use YounitedPaySDK\Request\Stream;
use YounitedPaySDK\Model\BestPrice;
use YounitedPaySDK\Response\ResponseBuilder;
use YounitedPaySDK\Response\DefaultResponse;

class BestPriceResponseTest extends TestCase
{
    /**
     * Test of BestPrice API with a bad Model.
     * @expectedException \InvalidArgumentException
     *
     * @return void
     */
    public function testSuccess(): void
    {
        $bodyRequest = new BestPrice();
        $bodyRequest->setBorrowedAmount(149.90);

        $request = new BestPriceRequest();
        $request = $request->setModel($bodyRequest);


        $stream = new Stream();
        $content = (string) file_get_contents(__DIR__ . '/dataset/bestprice.json');
        $bodyResponse = $stream->create($content);

        $responseObject = $request->getResponseObject();
        $message = DefaultResponse::getInstance($responseObject)
            ->withBody($bodyResponse);

        $response = (new ResponseBuilder($message))
                        ->getResponse();

        $offers = $response->getModel();

        $this->assertInstanceOf(\YounitedPaySDK\Model\ArrayCollection::class, $offers);
        $this->assertInstanceOf(\YounitedPaySDK\Model\OfferItem::class, $offers[0]);
        $this->assertEquals(36, count($offers));
    }
}
