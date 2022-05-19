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
use YounitedPaySDK\Model\BestPrice;
use YounitedPaySDK\Model\CancelContract;
use YounitedPaySDK\Model\ConfirmContract;
use YounitedPaySDK\Model\InitializeContract;
use YounitedPaySDK\Model\LoadContract;
use YounitedPaySDK\Model\WithdrawContract;
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
     * @param BestPrice $model
     * @return ResponseInterface
     */
    public function getBestPrice(BestPrice $model)
    {
        $request = new BestPriceRequest();
        return $this->call($model, $request);
    }

    /**
     * @param InitializeContract $model
     * @return ResponseInterface
     */
    public function initializeContract(InitializeContract $model)
    {
        $request = new InitializeContractRequest();
        return $this->call($model, $request);
    }

    /**
     * @param ConfirmContract $model
     * @return ResponseInterface
     */
    public function confirmContract(ConfirmContract $model)
    {
        $request = new ConfirmContractRequest();
        return $this->call($model, $request);
    }

    /**
     * @param CancelContract $model
     * @return ResponseInterface
     */
    public function cancelContract(CancelContract $model)
    {
        $request = new CancelContractRequest();
        return $this->call($model, $request);
    }

    /**
     * @param WithdrawContract $model
     * @return ResponseInterface
     */
    public function withdrawContract(WithdrawContract $model)
    {
        $request = new WithdrawContractRequest();
        return $this->call($model, $request);
    }

    /**
     * @param LoadContract $model
     * @return ResponseInterface
     */
    public function loadContract(LoadContract $model)
    {
        $request = new LoadContractRequest();
        return $this->call($model, $request);
    }
}
