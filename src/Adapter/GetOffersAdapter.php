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

namespace YounitedPaySDK\Adapter;

use YounitedPaySDK\Model\NewAPI\Request\GetOffers;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Request\BestPriceRequest;
use YounitedPaySDK\Request\NewAPI\GetOffersRequest;

/**
 * Get Offers Adapter Class.
 */
class GetOffersAdapter extends AbstractAdapter
{
    /**
     * @var string
     */
    protected $request = GetOffersRequest::class;

    /**
     * @var string
     */
    protected $model = GetOffers::class;

    /**
     * @var string
     */
    protected $namespace = '\YounitedPaySDK\Model\NewAPI\\';

    /**
     * @var null|string
     *                  cf. https://docs.younited.com/pay/#tag/personal-loans/GET/personal-loans/offers
     */
    private $maturityList;

    /**
     * @var null|int
     */
    private $maturityRangeMin;

    /**
     * @var null|int
     */
    private $maturityRangeStep;

    /**
     * @var null|int
     */
    private $maturityRangeMax;

    /**
     * @param BestPriceRequest $request
     *
     * @return AbstractRequest
     *
     * @throws \Exception
     */
    public function convertBestPrice($request)
    {
        if (false === $request instanceof GetOffersRequest) {
            throw new \InvalidArgumentException(
                'Request be an instance of '.GetOffersRequest::class.' but '.\get_class($request).' is given.'
            );
        }

        return $this->convertRequest($request);
    }

    /**
     * @return mixed
     */
    protected function getModelMapping()
    {
        return [
            'amount' => 'borrowedAmount',
            'shopCode' => 'shopCode',
        ];
    }

    /**
     * @param GetOffers $model
     *
     * @return GetOffers
     */
    protected function completeDataModel($model)
    {
        if (false === empty($this->maturityList)) {
            $model->setMaturityList($this->maturityList);

            return $model;
        }
        if (false === empty($this->maturityRangeMin)
            && false === empty($this->maturityRangeStep)
            && false === empty($this->maturityRangeMax)
        ) {
            $model
                ->setMaturityRangeMin($this->maturityRangeMin)
                ->setMaturityRangeStep($this->maturityRangeStep)
                ->setMaturityRangeMax($this->maturityRangeMax)
            ;

            return $model;
        }

        throw new \InvalidArgumentException(
            'Maturity List and Maturity Range cannot be empty.'
        );
    }

    /**
     * Set Maturity List.
     *
     * @param string $maturityList
     *
     * @return self
     */
    private function setMaturityList($maturityList)
    {
        if (true === \is_string($maturityList)) {
            $this->maturityList = $maturityList;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity List must be a string but '.\gettype($maturityList).' is given.'
        );
    }

    /**
     * Set Maturity Range Min.
     *
     * @param int $maturityRangeMin
     *
     * @return self
     */
    private function setMaturityRangeMin($maturityRangeMin)
    {
        if (true === \is_int($maturityRangeMin) || (null === $maturityRangeMin) === true) {
            $this->maturityRangeMin = $maturityRangeMin;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity Range Min must be a integer but '.\gettype($maturityRangeMin).' is given.'
        );
    }

    /**
     * Set Maturity Range Step.
     *
     * @param null|int $maturityRangeStep
     *
     * @return self
     */
    private function setMaturityRangeStep($maturityRangeStep)
    {
        if (true === \is_int($maturityRangeStep) || (null === $maturityRangeStep) === true) {
            $this->maturityRangeStep = $maturityRangeStep;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity Range Step must be a integer but '.\gettype($maturityRangeStep).' is given.'
        );
    }

    /**
     * Set Maturity Range Max.
     *
     * @param null|int $maturityRangeMax
     *
     * @return self
     */
    private function setMaturityRangeMax($maturityRangeMax)
    {
        if (true === \is_int($maturityRangeMax) || (null === $maturityRangeMax) === true) {
            $this->maturityRangeMax = $maturityRangeMax;

            return $this;
        }

        throw new \InvalidArgumentException(
            'Maturity Range Max must be a integer but '.\gettype($maturityRangeMax).' is given.'
        );
    }
}
