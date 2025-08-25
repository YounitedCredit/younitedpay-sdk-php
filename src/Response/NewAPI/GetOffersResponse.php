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

namespace YounitedPaySDK\Response\NewAPI;

use InvalidArgumentException;
use YounitedPaySDK\Model\ArrayCollection;
use YounitedPaySDK\Model\NewAPI\Error;
use YounitedPaySDK\Model\OfferItem;
use YounitedPaySDK\Response\AbstractResponse;

/**
 * Get Offers Response Class
 */
class GetOffersResponse extends AbstractResponse
{
    /**
     * @inherit
     */
    public function getModel()
    {
        $content = (string) $this->stream;
        if (empty($content) === true) {
            return new ArrayCollection();
        }

        $output = json_decode($content, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidArgumentException('json_decode error: ' . json_last_error_msg());
        }
        if (empty($output) === true) {
            return new ArrayCollection();
        }

        if ($this->getStatusCode() < 200 || $this->getStatusCode() > 299) {
            return (new Error())->hydrate($output);
        }

        $offers = new ArrayCollection($output);
        $collection = [];
        foreach ($offers as $key => $value) {
            $collection[$key] = (new OfferItem())
                ->setRequestedAmount((float) $value['requestedAmount'])
                ->setAnnualPercentageRate((float) $value['details']['annualPercentageRate'] * 100)
                ->setAnnualDebitRate((float) $value['characteristics']['interestRate'] * 100)
                ->setDownPaymentAmount((float) $value['characteristics']['downPaymentAmount'])
                ->setMonthlyInstallmentAmount((float) $value['details']['monthlyInstallmentAmount'])
                ->setCreditTotalAmount((float) $value['details']['totalDueAmount'])
                ->setMaturityInMonths((int) $value['characteristics']['maturityInMonths'])
                ->setCreditAmountToFund((float) $value['details']['totalDueAmount'])
                ->setInterestsTotalAmount((float) $value['details']['interestsAmount']);
        }

        return new ArrayCollection($collection);
    }
}
