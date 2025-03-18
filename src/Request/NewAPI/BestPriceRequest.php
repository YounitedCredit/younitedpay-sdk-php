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

namespace YounitedPaySDK\Request\NewAPI;

use YounitedPaySDK\Stream;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Model\NewAPI\BestPrice;
use YounitedPaySDK\Response\NewAPI\BestPriceResponse;

/**
 * Get Best Price
 */
class BestPriceRequest extends AbstractRequest
{
    /**
     * @var BestPrice
     */
    protected $body;

    /**
     * @var string
     */
    protected $requestTarget = '/personal-loans/offers';

    /**
     * @var string
     */
    public $query = 'amount={amount}&{maturity}&ShopCode={shopcode}';

    /**
     * @var string
     */
    protected $method = 'GET';

    /** @var string */
    protected $response = BestPriceResponse::class;

    /**
     * @inherit
     */
    public function setModel(AbstractModel $body)
    {
        if ($body instanceof BestPrice) {
            $maturityConfiguration = $body->getMaturity();
            $maturityQuery = 'Maturity.List=24,36';
            if (isset($maturityConfiguration['List'])) {
                $maturityQuery = 'Maturity.List=' . $maturityConfiguration['List'];
            }
            if (isset($maturityConfiguration['Range'])) {
                $range = $maturityConfiguration['Range'];
                $maturityQuery = "Maturity.Range.Min=" . ( isset($range['Min']) ? (int) $range['Min'] : 24 );
                $maturityQuery .= "&Maturity.Range.Max=" . ( isset($range['Max']) ? (int) $range['Max'] : 48 );
                $maturityQuery .= "&Maturity.Range.Step=" . ( isset($range['Step']) ? (int) $range['Step'] : 1 );
                // $maturityQuery = "Maturity['Range']['Min']=" . ( isset($range['Min']) ? (int) $range['Min'] : 24 );
                // $maturityQuery .= "&Maturity['Range']['Max']=" . ( isset($range['Max']) ? (int) $range['Max'] : 48 );
                // $maturityQuery .= "&Maturity['Range']['Step']=" . ( isset($range['Step']) ? (int) $range['Step'] : 1 );
            }
            $this->query = str_replace(
                [
                    '{amount}',
                    '{maturity}',
                    '{shopcode}',
                ],
                [
                    urlencode($body->getBorrowedAmount()),
                    $maturityQuery,
                    urlencode($body->getShopCode()),
                ],
                $this->query
            );

            $new = clone $this;
            $new->uri = $new->uri->withPath($this->requestTarget)->withQuery($this->query);
            $new->updateHostFromUri();
            $new->stream = Stream::create('');

            return $new;
        }

        throw new \InvalidArgumentException(
            'Body must be an instance of ' .  BestPrice::class . ' ' . get_class($body) . ' given.'
        );
    }
}
