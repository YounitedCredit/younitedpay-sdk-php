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

namespace YounitedPaySDK\Request;

use Psr\Http\Message\RequestInterface;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Stream;
use YounitedPaySDK\Uri\ProductionUri;
use YounitedPaySDK\Uri\SandboxUri;

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

    /** @var string Uri fragment. */
    protected $tenantId = '5fe44fa6-b50a-42d9-a006-199bedeb5bb9';

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
        $new->tenantId = 'c9536195-ef3b-4703-9c13-924db8e24486';
        $new->updateHostFromUri();

        return $new;
    }

    /**
     * Get Scheme
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->tenantId;
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
