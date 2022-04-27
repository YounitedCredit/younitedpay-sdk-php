<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use YounitedPaySDK\Model\Address;
use YounitedPaySDK\Model\Basket;
use YounitedPaySDK\Model\BasketItem;
use YounitedPaySDK\Model\InitializeContract;
use YounitedPaySDK\Model\MerchantOrderContext;
use YounitedPaySDK\Model\MerchantUrls;
use YounitedPaySDK\Model\PersonalInformation;

class InitializeContractTest extends TestCase
{
    /**
     * @return InitializeContract
     */
    public function testInstance()
    {
        $initializeContract = new \YounitedPaySDK\Model\InitializeContract();
        $this->assertInstanceOf(\YounitedPaySDK\Model\InitializeContract::class, $initializeContract);

        return $initializeContract;
    }

    /**
     * @depends testInstance
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testRequestMaturity($initializeContract)
    {
        $initializeContract->setRequestedMaturity(10);

        $this->assertEquals(10, $initializeContract->getRequestedMaturity());

        return $initializeContract;
    }

    /**
     * @depends testRequestMaturity
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testPersonalInformation($initializeContract)
    {
        $datetime = new \DateTime('1970-01-01T00:00:00');

        $address = new Address();
        $address->setStreetNumber('123');
        $address->setStreetName('StreetName');
        $address->setAdditionalAddress('');
        $address->setCity('Country');
        $address->setPostalCode('12345');
        $address->setCountryCode('FR');

        $personalInformation = new PersonalInformation();
        $personalInformation->setFirstName('FirstName');
        $personalInformation->setLastName('LastName');
        $personalInformation->setGenderCode('MALE');
        $personalInformation->setEmailAddress('firstname.lastname@mail.com');
        $personalInformation->setCellPhoneNumber('33611223344');
        $personalInformation->setBirthDate($datetime);
        $personalInformation->setAddress($address);

        $this->assertInstanceOf(PersonalInformation::class, $personalInformation);

        $initializeContract->setPersonalInformation($personalInformation);

        $this->assertEquals($personalInformation, $initializeContract->getPersonalInformation());

        return $initializeContract;
    }

    /**
     * @depends testPersonalInformation
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testBasket($initializeContract)
    {
        $basketItem1 = new BasketItem();
        $basketItem1->setItemName('Item basket 1');
        $basketItem1->setQuantity(2);
        $basketItem1->setUnitPrice(45.0);

        $basketItem2 = new BasketItem();
        $basketItem2->setItemName('Item basket 2');
        $basketItem2->setQuantity(1);
        $basketItem2->setUnitPrice(33.0);

        $basket = new Basket();
        $basket->setBasketAmount(123.0);
        $basket->setItems([$basketItem1, $basketItem2]);

        $initializeContract->setBasket($basket);

        $this->assertEquals($basket, $initializeContract->getBasket());

        return $initializeContract;
    }

    /**
     * @depends testBasket
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testMerchantUrls($initializeContract)
    {
        $merchantUrls = new MerchantUrls();
        $merchantUrls->setOnApplicationFailedRedirectUrl('on-application-failed-redirect-url.com');
        $merchantUrls->setOnApplicationSucceededRedirectUrl('on-application-succeeded-redirect-url.com');
        $merchantUrls->setOnCanceledWebhookUrl('on-canceled-webhook-url.com');
        $merchantUrls->setOnWithdrawnWebhookUrl('on-withdrawn-webhook-url.com');

        $initializeContract->setMerchantUrls($merchantUrls);

        $this->assertEquals($merchantUrls, $initializeContract->getMerchantUrls());

        return $initializeContract;
    }

    /**
     * @depends testMerchantUrls
     *
     * @param InitializeContract $initializeContract
     *
     * @return bool
     */
    public function testMerchantOrderContext($initializeContract)
    {
        $merchantOrderContext = new MerchantOrderContext();
        $merchantOrderContext->setChannel('test');
        $merchantOrderContext->setShopCode('TEST');
        $merchantOrderContext->setMerchantReference('MerchantReference');
        $merchantOrderContext->setAgentEmailAddress('merchant@mail.com');

        $initializeContract->setMerchantOrderContext($merchantOrderContext);

        $this->assertEquals($merchantOrderContext, $initializeContract->getMerchantOrderContext());

        return true;
    }
}