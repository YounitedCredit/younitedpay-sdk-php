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

namespace YounitedPaySDK\Response\NewAPI;

use YounitedPaySDK\Model\ArrayCollection;
use YounitedPaySDK\Model\NewAPI\Error;
use YounitedpaySdk\Model\NewAPI\Installment;
use YounitedPaySDK\Model\NewAPI\PaymentOptionItem;
use YounitedPaySDK\Response\AbstractResponse;

/**
 * Get Payment Options Response Class.
 */
class GetPaymentOptionsResponse extends AbstractResponse
{
    /**
     * @inherit
     */
    public function getModel()
    {
        $content = (string) $this->stream;
        if (true === empty($content)) {
            return new ArrayCollection();
        }

        $output = json_decode($content, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException('json_decode error: '.json_last_error_msg());
        }
        if (true === empty($output)) {
            return new ArrayCollection();
        }

        if ($this->getStatusCode() < 200 || $this->getStatusCode() > 299) {
            return (new Error())->hydrate($output);
        }

        $offers = new ArrayCollection($output);
        $collection = [];
        foreach ($offers as $key => $value) {
            $detailsSection = 'SplitPayment' === $value['type'] ? $value['splitPaymentDetails'] : $value['personalLoanDetails'];
            $item = (new PaymentOptionItem())
                ->setType((string) $value['type'])
                ->setDownPaymentAmount((float) ($detailsSection['downPaymentAmount'] ?? 0))
                ->setRequestedAmount((float) $value['purchaseAmount'])
                ->setAnnualPercentageRate((float) ($detailsSection['loanDetails']['annualPercentageRate'] * 100))
                ->setAnnualDebitRate((float) ($detailsSection['loanTerms']['interestRate'] * 100))
                ->setMonthlyInstallmentAmount((float) $detailsSection['loanDetails']['installmentAmount'])
                ->setCreditTotalAmount((float) $detailsSection['loanDetails']['totalAmountPayable'])
                ->setMaturityInMonths((int) $detailsSection['loanTerms']['installmentCount'])
                ->setCreditAmountToFund((float) $detailsSection['loanDetails']['totalAmountPayable'])
                ->setInterestsTotalAmount((float) $detailsSection['loanDetails']['interestAmount'])
            ;
            if ('SplitPayment' === $value['type']) {
                if (isset($detailsSection['installments'])) {
                    $installments = [];
                    foreach ($detailsSection['installments'] as $oneInstallment) {
                        $installments[] = (new Installment())
                            ->setDueDate((string) $oneInstallment['dueDate'])
                            ->setFeeAmount((float) $oneInstallment['feeAmount'])
                            ->setInstallmentNumber((int) $oneInstallment['installmentNumber'])
                            ->setLoanAmount((float) $oneInstallment['loanAmount'])
                            ->setTotalAmount((float) $oneInstallment['totalAmount'])
                        ;
                    }
                    $item->setInstallmentDetails($installments);
                }
            }
            $collection[$key] = $item;
        }

        return new ArrayCollection($collection);
    }
}
