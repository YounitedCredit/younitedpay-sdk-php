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

namespace Tot\YounitedPaySDK\Request;

use Tot\YounitedPaySDK\Model\AbstractModel;
use Psr\Http\Message\RequestInterface;
use Tot\YounitedPaySDK\Uri\ProductionUri;
use Tot\YounitedPaySDK\Uri\SandboxUri;

/**
 * API client
 */
abstract class AbstractRequest implements RequestInterface
{
    use MessageTrait;
    use RequestTrait;

    /**
     * @var AbstractModel
     */
    private $body;

    /**
     * @var string
     */
    protected $response;

    /**
     * @var bool
     */
    private $isSandbox = false;

    /**
     * @param array<string> $headers Request headers
     * @param string $version protocol version
     */
    public function __construct(array $headers = [], $version = '1.1')
    {
        $this->uri = new ProductionUri();
        $this->uri = $this->uri->withPath('/api/1.0' . $this->requestTarget);

        $this->setHeaders($headers);

        $this->protocol = $version;

        if (!$this->hasHeader('Host')) {
            $this->updateHostFromUri();
        }

        // initialization of the stream until Request::getBody()
        $this->stream = Stream::create('');
    }

    /**
     * Enbale Sandbox
     *
     * @return self
     */
    public function enableSanbox()
    {
        $new = clone $this;
        $new->isSandbox = true;
        $new->uri = new SandboxUri();
        $new->uri = $new->uri->withPath('/api/1.0' . $this->requestTarget);
        $new->updateHostFromUri();

        return $new;
    }

    /**
     * Set Body From Model
     * @param AbstractModel $body
     *
     * @return self
     */
    public function setModel(AbstractModel $body)
    {
        $json = json_encode($body->jsonSerialize(), JSON_PRETTY_PRINT);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException(
                'json_encode error: ' . json_last_error_msg()
            );
        }
        $new = clone $this;
        $new->stream = Stream::create((string) $json);

        return $new;
    }

    /**
     * Set Body From Model
     *
     * @return string
     */
    public function getResponseObject()
    {
        return $this->response;
    }
}
