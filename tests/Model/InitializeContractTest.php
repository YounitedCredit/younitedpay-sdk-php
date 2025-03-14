<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use YounitedPaySDK\Model\CustomExperience;
use YounitedPaySDK\Model\LoanRequest;
use YounitedPaySDK\Model\PostalAddress;
use YounitedPaySDK\Model\BasketDescription;
use YounitedPaySDK\Model\BasketItem;
use YounitedPaySDK\Model\InitializeContract;
use YounitedPaySDK\Model\MerchantContext;
use YounitedPaySDK\Model\CustomerInformation;
use YounitedPaySDK\Model\RiskInsights;
use YounitedPaySDK\Model\TechnicalInformation;

class InitializeContractTest extends TestCase
{
    /**
     * @depends testInstance
     *
     * @return InitializeContract
     */
    public function testInstance()
    {
        $initializeContract = new \YounitedPaySDK\Model\InitializeContract();
        $this->assertInstanceOf(\YounitedPaySDK\Model\InitializeContract::class, $initializeContract);

        return $initializeContract;
    }

    /**
     * @depends testLoanRequest
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testLoanRequest($initializeContract)
    {
        $loanRequest = new LoanRequest();
        $loanRequest->setRequestedAmount(123.0);
        $loanRequest->setRequestedMaturityInMonths('10');

        $this->assertInstanceOf(CustomerInformation::class, $loanRequest);

        $initializeContract->setLoanRequest($loanRequest);

        $this->assertEquals($loanRequest, $initializeContract->getLoanRequest());

        return $initializeContract;
    }

    /**
     * @depends testBasketDescription
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testBasketDescription($initializeContract)
    {
        $basketItem1 = new BasketItem();
        $basketItem1->setName('Item basket 1');
        $basketItem1->setQuantity(2);
        $basketItem1->setUnitPrice(45.0);

        $basketItem2 = new BasketItem();
        $basketItem2->setName('Item basket 2');
        $basketItem2->setQuantity(1);
        $basketItem2->setUnitPrice(33.0);

        $basket = new BasketDescription();
        $basket->setItems([$basketItem1, $basketItem2]);

        $initializeContract->setBasketDescription($basket);

        $this->assertEquals($basket, $initializeContract->getBasketDescription());

        return $initializeContract;
    }

    /**
     * @depends testMerchantContext
     *
     * @param InitializeContract $initializeContract
     *
     * @return bool
     */
    public function testMerchantContext($initializeContract)
    {
        $merchantContext = new MerchantContext();
        $merchantContext->setShopCode('TEST');
        $merchantContext->setMerchantReference('MerchantReference');
        $merchantContext->setSalesClerkContactEmailAddress('merchant@mail.com');

        $initializeContract->setMerchantContext($merchantContext);

        $this->assertEquals($merchantContext, $initializeContract->getMerchantContext());

        return true;
    }

    /**
     * @depends testTechnicalInformation
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testTechnicalInformation($initializeContract)
    {
        $technicalInformation = new TechnicalInformation();
        $technicalInformation->setWebhookNotificationUrl('webhook-notification-url.com');
        $technicalInformation->setApiVersion('2025-01-01');

        $initializeContract->setTechnicalInformation($technicalInformation);

        $this->assertEquals($technicalInformation, $initializeContract->getTechnicalInformation());

        return $initializeContract;
    }

    /**
     * @depends testCustomerInformation
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testCustomerInformation($initializeContract)
    {
        $datetime = new \DateTime('1970-01-01T00:00:00');

        $postalAddress = new PostalAddress();
        $postalAddress->setAddressLine1('123 StreetName');
        $postalAddress->setAddressLine2('');
        $postalAddress->setCity('Country');
        $postalAddress->setPostalCode('12345');
        $postalAddress->setCountryCode('FR');

        $customerInformation = new CustomerInformation();
        $customerInformation->setFirstName('FirstName');
        $customerInformation->setLastName('LastName');
        $customerInformation->setEmailAddress('firstname.lastname@mail.com');
        $customerInformation->setMobilePhoneNumber('33611223344');
        $customerInformation->setBirthDate($datetime);
        $customerInformation->setPostalAddress($postalAddress);

        $this->assertInstanceOf(CustomerInformation::class, $customerInformation);

        $initializeContract->setCustomerInformation($customerInformation);

        $this->assertEquals($customerInformation, $initializeContract->getCustomerInformation());

        return $initializeContract;
    }

    /**
     * @depends testRiskInsights
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testRiskInsights($initializeContract)
    {
        $riskInsights = new RiskInsights();
        $riskInsights->setCustomerSegmentationCode('Standard');
        $riskInsights->setCustomerIpAddress('127.0.0.1');

        $initializeContract->setRiskInsights($riskInsights);

        $this->assertEquals($riskInsights, $initializeContract->getRiskInsights());

        return $initializeContract;
    }

    /**
     * @depends testCustomExperience
     *
     * @param InitializeContract $initializeContract
     *
     * @return InitializeContract
     */
    public function testCustomExperience($initializeContract)
    {
        $customExperience = new CustomExperience();
        $customExperience->setCustomerRedirectUrl('customer-redirect-url.com');

        $initializeContract->setCustomExperience($customExperience);

        $this->assertEquals($customExperience, $initializeContract->getCustomExperience());

        return $initializeContract;
    }
}
