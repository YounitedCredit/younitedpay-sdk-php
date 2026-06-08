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

namespace YounitedPaySDK\Adapter;

use Exception;
use InvalidArgumentException;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Model\NewAPI\RiskInsights;
use YounitedPaySDK\Model\NewAPI\CustomExperience;
use YounitedPaySDK\Model\NewAPI\TechnicalInformation;
use YounitedPaySDK\Request\InitializeContractRequest;
use YounitedPaySDK\Model\NewAPI\Request\CreatePayment;
use YounitedPaySDK\Request\NewAPI\PostPaymentsRequest;

/**
 * Post Payment Adapter Class
 */
class PostPaymentAdapter extends AbstractAdapter
{
    /**
     * @var string
     */
    protected $request = PostPaymentsRequest::class;

    /**
     * @var string
     */
    protected $model = CreatePayment::class;

    /**
     * @var string
     */
    protected $namespace = '\YounitedPaySDK\Model\NewAPI\\';

    /**
     * @var string
     */
    private $shopCode;

    /**
     * @var TechnicalInformation
     */
    private $technicalInformation;

    /**
     * @var RiskInsights|null
     */
    private $riskInsights;

    /**
     * @var CustomExperience|null
     */
    private $customExperience;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $purchaseAmount;

    /**
     * @var int|null
     */
    private $installmentCount;

    /**
     * @return array[]
     */
    protected function getModelMapping()
    {
        return [
            'merchantContext' => [
                'className' => 'MerchantContext',
                'properties' => [
                    'merchantReference' => 'merchantOrderContext.merchantReference',
                    'salesClerkContactEmailAddress' => 'merchantOrderContext.agentEmailAddress',
                ],
            ],
            'customerInformation' => [
                'className' => 'CustomerInformation',
                'properties' => [
                    'firstName' => 'personalInformation.firstName',
                    'lastName' => 'personalInformation.lastName',
                    'emailAddress' => 'personalInformation.emailAddress',
                    'mobilePhoneNumber' => 'personalInformation.mobilePhoneNumber',
                    'birthDate' => 'personalInformation.birthDate',
                    'postalAddress' => [
                        'className' => 'PostalAddress',
                        'properties' => [
                            'addressLine1' => 'personalInformation.address.streetNumber+personalInformation.address.streetName',
                            'addressLine2' => 'personalInformation.address.additionalAddress',
                            'city' => 'personalInformation.address.city',
                            'postalCode' => 'personalInformation.address.postalCode',
                            'countryCode' => 'personalInformation.address.countryCode',
                        ],
                    ],
                ],
            ],
            'basketDescription' => [
                'className' => 'BasketDescription',
                'properties' => [
                    'items' => [
                        'basket.items' => [
                            'className' => 'BasketDescriptionItem',
                            'properties' => [
                                'name' => 'itemName',
                                'quantity' => 'quantity',
                                'unitPrice' => 'unitPrice',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param CreatePayment $model
     *
     * @return CreatePayment
     */
    protected function completeDataModel($model)
    {
        if (empty($this->shopCode)) {
            throw new InvalidArgumentException(
                'Shop Code cannot be empty.'
            );
        }

        if (empty($this->technicalInformation)) {
            throw new InvalidArgumentException(
                'Technical Information cannot be empty.'
            );
        }

        $merchantContext = $model->getMerchantContext();
        $merchantContext->setShopCode($this->shopCode);

        $model
            ->setMerchantContext($merchantContext)
            ->setTechnicalInformation($this->technicalInformation);

        // Convert CreatePayment data for new Payment details
        $model->setPaymentType($this->getType());
        $model->setInstallmentCount($this->getInstallmentcount());
        $model->setPurchaseAmount($this->getPurchaseAmount());

        $techInformations = $model->getTechnicalInformation();
        $techInformations->setApiVersion('2026-02-01');
        $techInformations->setWebhookNotificationApiVersion($techInformations->getApiVersion());
        $model->setTechnicalInformation($techInformations);

        if (false === empty($this->riskInsights)) {
            $model->setRiskInsights($this->riskInsights);
        }

        if (false === empty($this->customExperience)) {
            $model->setCustomExperience($this->customExperience);
        }

        return $model;
    }

    /**
     * @param InitializeContractRequest $request
     *
     * @return AbstractRequest
     *
     * @throws Exception
     */
    public function convertInitializeContract($request)
    {
        if (($request instanceof InitializeContractRequest) === false) {
            throw new InvalidArgumentException(
                'Request be an instance of ' .  InitializeContractRequest::class . ' but ' . get_class($request) . ' is given.'
            );
        }

        return $this->convertRequest($request);
    }

    /**
     * Set Shop Code
     *
     * @param string $shopCode
     *
     * @return self
     */
    public function setShopCode($shopCode)
    {
        if (is_string($shopCode) === true) {
            $this->shopCode = $shopCode;
            return $this;
        }

        throw new InvalidArgumentException(
            'Shop Code must be a string but ' . gettype($shopCode) . ' is given.'
        );
    }

    /**
     * Set Technical Information
     *
     * @param TechnicalInformation $technicalInformation
     *
     * @return self
     */
    public function setTechnicalInformation($technicalInformation)
    {
        if ($technicalInformation instanceof TechnicalInformation) {
            $this->technicalInformation = $technicalInformation;
            return $this;
        }

        throw new InvalidArgumentException(
            'Technical Information must be an instance of ' . TechnicalInformation::class . ' but ' . get_class($technicalInformation) . ' is given.'
        );
    }

    /**
     * Set Risk Insights
     *
     * @param RiskInsights $riskInsights
     *
     * @return self
     */
    public function setRiskInsights($riskInsights)
    {
        if ($riskInsights instanceof RiskInsights) {
            $this->riskInsights = $riskInsights;
            return $this;
        }

        throw new InvalidArgumentException(
            'Risk Insights must be an instance of ' . RiskInsights::class . ' but ' . get_class($riskInsights) . ' is given.'
        );
    }

    /**
     * Set Custom Experience
     *
     * @param CustomExperience $customExperience
     *
     * @return self
     */
    public function setCustomExperience($customExperience)
    {
        if ($customExperience instanceof CustomExperience) {
            $this->customExperience = $customExperience;
            return $this;
        }

        throw new InvalidArgumentException(
            'Custom Experience must be an instance of ' . CustomExperience::class . ' but ' . get_class($customExperience) . ' is given.'
        );
    }

    /**
     * Get the value of type
     *
     * @return  string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param   string|null  $type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of purchaseAmount
     *
     * @return  string|null
     */
    public function getPurchaseAmount()
    {
        return $this->purchaseAmount;
    }

    /**
     * Set the value of purchaseAmount
     *
     * @param   string|null  $purchaseAmount
     *
     * @return  self
     */
    public function setPurchaseAmount($purchaseAmount)
    {
        $this->purchaseAmount = $purchaseAmount;

        return $this;
    }

    /**
     * Get the value of installmentCount
     *
     * @return  int|null
     */
    public function getInstallmentCount()
    {
        return $this->installmentCount;
    }

    /**
     * Set the value of installmentCount
     *
     * @param   int|null  $installmentCount
     *
     * @return  self
     */
    public function setInstallmentCount($installmentCount)
    {
        $this->installmentCount = $installmentCount;

        return $this;
    }
}
