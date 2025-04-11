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
use YounitedPaySDK\Model\NewAPI\CustomExperience;
use YounitedPaySDK\Model\NewAPI\Request\CreatePayment;
use YounitedPaySDK\Model\NewAPI\RiskInsights;
use YounitedPaySDK\Model\NewAPI\TechnicalInformation;
use YounitedPaySDK\Request\InitializeContractRequest;
use YounitedPaySDK\Request\NewAPI\CreatePaymentRequest;

/**
 * Create Payment Adapter Class
 */
class CreatePaymentAdapter extends AbstractAdapter
{
    /**
     * @var string
     */
    protected $request = CreatePaymentRequest::class;

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
     * @return array[]
     */
    protected function getModelMapping()
    {
        return [
            'loanRequest' => [
                'className' => 'LoanRequest',
                'properties' => [
                    'requestedAmount' => 'basket.basketAmount',
                    'requestedMaturityInMonths' => 'requestedMaturity',
                ],
            ],
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
     * @return CreatePaymentRequest
     *
     * @throws Exception
     */
    public function convertInitializeContract($request)
    {
        if ($request instanceof InitializeContractRequest === false) {
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
}
