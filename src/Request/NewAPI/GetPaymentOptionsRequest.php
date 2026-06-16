<?php

declare(strict_types=1);

/*
 *     NOTICE OF LICENSE
 *
 *     This source file is subject to the Open Software License (OSL 3.0)
 *     PHP version 5.6+
 *
 *     @category  YounitedpaySDK
 *     @package   Ecommerceyounitedpaysdk
 *     @author    202-ecommerce <tech@202-ecommerce.com>
 *     @copyright 2022 (c) 202-ecommerce
 *     @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 *     @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Request\NewAPI;

use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\NewAPI\Request\GetOffers;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Response\NewAPI\GetPaymentOptionsResponse;

/**
 * Get Payment Options Request Class.
 */
class GetPaymentOptionsRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $apiVersion = '2026-02-01';

    /**
     * @var string
     */
    protected $requestTarget = '/payments/options';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = GetPaymentOptionsResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof GetOffers) {
            $queryParameters[] = 'PurchaseAmount='.urlencode($body->getAmount());
            $queryParameters[] = 'ShopCode='.urlencode($body->getShopCode());

            if (false === empty($body->getMaturityList())) {
                $queryParameters[] = 'InstallmentCount.List='.urlencode($body->getMaturityList());
            }
            if (false === empty($body->getMaturityRangeMin()) || false === empty($body->getMaturityRangeStep()) || false === empty($body->getMaturityRangeMax())) {
                $queryParameters[] = 'InstallmentCount.Range.Min='.(empty($body->getMaturityRangeMin()) ? 24 : $body->getMaturityRangeMin());
                $queryParameters[] = 'InstallmentCount.Range.Step='.(empty($body->getMaturityRangeStep()) ? 1 : $body->getMaturityRangeStep());
                $queryParameters[] = 'InstallmentCount.Range.Max='.(empty($body->getMaturityRangeMax()) ? 48 : $body->getMaturityRangeMax());
            }

            $queryParameters = implode('&', $queryParameters);
            $this->uri = $this->uri->withQuery($queryParameters);

            return $this;
        }

        throw new \InvalidArgumentException(
            'Body must be an instance of '.GetOffers::class.' but '.\get_class($body).' is given.'
        );
    }
}
