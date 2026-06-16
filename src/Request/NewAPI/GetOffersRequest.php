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
use YounitedPaySDK\Response\NewAPI\GetOffersResponse;

/**
 * Get Offers Request Class.
 */
class GetOffersRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $apiVersion = '2025-01-01';

    /**
     * @var string
     */
    protected $requestTarget = '/personal-loans/offers';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = GetOffersResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof GetOffers) {
            $queryParameters[] = 'Amount='.urlencode($body->getAmount());
            $queryParameters[] = 'ShopCode='.urlencode($body->getShopCode());

            if (false === empty($body->getMaturityList())) {
                $queryParameters[] = 'Maturity.List='.urlencode($body->getMaturityList());
            } else {
                $queryParameters[] = 'Maturity.Range.Min='.(empty($body->getMaturityRangeMin()) ? 24 : $body->getMaturityRangeMin());
                $queryParameters[] = 'Maturity.Range.Step='.(empty($body->getMaturityRangeStep()) ? 1 : $body->getMaturityRangeStep());
                $queryParameters[] = 'Maturity.Range.Max='.(empty($body->getMaturityRangeMax()) ? 48 : $body->getMaturityRangeMax());
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
