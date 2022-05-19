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

namespace YounitedPaySDK\Service;

use Psr\Http\Message\ResponseInterface;
use YounitedPaySDK\Model\Basket;
use YounitedPaySDK\Model\BestPrice;
use YounitedPaySDK\Model\CancelContract;
use YounitedPaySDK\Model\ConfirmContract;
use YounitedPaySDK\Model\InitializeContract;
use YounitedPaySDK\Model\LoadContract;
use YounitedPaySDK\Model\MerchantOrderContext;
use YounitedPaySDK\Model\MerchantUrls;
use YounitedPaySDK\Model\PersonalInformation;
use YounitedPaySDK\Model\WithdrawContract;
use YounitedPaySDK\Request\AvailableMaturitiesRequest;
use YounitedPaySDK\Request\BestPriceRequest;
use YounitedPaySDK\Request\CancelContractRequest;
use YounitedPaySDK\Request\ConfirmContractRequest;
use YounitedPaySDK\Request\InitializeContractRequest;
use YounitedPaySDK\Request\LoadContractRequest;
use YounitedPaySDK\Request\WithdrawContractRequest;

/**
 * Client Api Service Class
 */
class ClientApiService extends AbstractClientApiService
{
    /**
     * @param float $borrowedAmount
     *
     * @return ResponseInterface
     */
    public function getBestPrice($borrowedAmount)
    {
        $model = (new BestPrice())
            ->setBorrowedAmount($borrowedAmount);

        $request = new BestPriceRequest();

        return $this->call($model, $request);
    }

    /**
     * @param int $requestMaturity
     * @param PersonalInformation $personalInformation
     * @param Basket $basket
     * @param MerchantUrls $merchantUrls
     * @param MerchantOrderContext $merchantOrderContext
     *
     * @return ResponseInterface
     */
    public function initializeContract($requestMaturity, PersonalInformation $personalInformation, Basket $basket, MerchantUrls $merchantUrls, MerchantOrderContext $merchantOrderContext)
    {
        $model = (new InitializeContract())
            ->setRequestedMaturity($requestMaturity)
            ->setPersonalInformation($personalInformation)
            ->setBasket($basket)
            ->setMerchantUrls($merchantUrls)
            ->setMerchantOrderContext($merchantOrderContext);

        $request = new InitializeContractRequest();

        return $this->call($model, $request);
    }

    /**
     * @param string $contractReference
     * @param string|null $merchantOrderId
     *
     * @return ResponseInterface
     */
    public function confirmContract($contractReference, $merchantOrderId = null)
    {
        $model = (new ConfirmContract())
            ->setContractReference($contractReference)
            ->setMerchantOrderId($merchantOrderId);

        $request = new ConfirmContractRequest();

        return $this->call($model, $request);
    }

    /**
     * @param string $contractReference
     *
     * @return ResponseInterface
     */
    public function cancelContract($contractReference)
    {
        $model = (new CancelContract())
            ->setContractReference($contractReference);

        $request = new CancelContractRequest();

        return $this->call($model, $request);
    }

    /**
     * Set amount to null for a complete withdraw or set a value for a partial withdraw.
     *
     * @param string $contractReference
     * @param float|null $amount
     *
     * @return ResponseInterface
     */
    public function withdrawContract($contractReference, $amount = null)
    {
        $model = (new WithdrawContract())
            ->setContractReference($contractReference)
            ->setAmount($amount);

        $request = new WithdrawContractRequest();

        return $this->call($model, $request);
    }

    /**
     * @param string $contractReference
     *
     * @return ResponseInterface
     */
    public function loadContract($contractReference)
    {
        $model = (new LoadContract())
            ->setContractReference($contractReference);

        $request = new LoadContractRequest();

        return $this->call($model, $request);
    }

    /**
     * @return ResponseInterface
     */
    public function getAvailableMaturities()
    {
        $model = null;

        $request = new AvailableMaturitiesRequest();

        return $this->call($model, $request);
    }
}
