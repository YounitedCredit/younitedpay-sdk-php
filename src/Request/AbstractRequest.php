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

use JsonSerializable;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Stream;
use YounitedPaySDK\Uri\NewAPI\ProductionUri as NewProductionUri;
use YounitedPaySDK\Uri\NewAPI\SandboxUri as NewSandboxUri;
use YounitedPaySDK\Uri\ProductionUri;
use YounitedPaySDK\Uri\SandboxUri;

/**
 * API client
 */
abstract class AbstractRequest implements JsonSerializable
{
    use MessageTrait;
    use RequestTrait;

    /**
     * @var string|null
     */
    protected $apiVersion = '2024-01-01';

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
        if ($this->getApiVersion() !== '2024-01-01') {
            $this->uri = new NewProductionUri();
        } else {
            $this->uri = new ProductionUri();
        }

        $this->uri = $this->uri->withPath($this->uri->getPath() . $this->requestTarget);

        $this->setHeaders($headers);

        $this->protocol = $version;

        if (!$this->hasHeader('Host')) {
            $this->updateHostFromUri();
        }

        // initialization of the stream until Request::getBody()
        $this->stream = Stream::create('');
    }

    /**
     * Enable Sandbox
     *
     * @return self
     */
    public function enableSandbox()
    {
        $new = clone $this;
        $new->isSandbox = true;

        if ($this->getApiVersion() !== '2024-01-01') {
            $new->uri = new NewSandboxUri();
        } else {
            $new->uri = new SandboxUri();
        }

        $new->uri = $new->uri
            ->withPath($new->uri->getPath() . $this->requestTarget)
            ->withQuery($this->uri->getQuery())
            ->withFragment($this->uri->getFragment());
        $new->tenantId = 'c9536195-ef3b-4703-9c13-924db8e24486';
        $new->updateHostFromUri();

        return $new;
    }

    /**
     * Is Sandbox Enabled
     *
     * @return bool
     */
    public function isSandboxEnabled()
    {
        return $this->isSandbox;
    }

    /**
     * Get Api Version
     *
     * @return string|null
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * Get Tenant Id
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

        if ($this->getApiVersion() !== '2024-01-01') {
            $new->uri = $new->isSandbox === false ? new NewProductionUri() : new NewSandboxUri();
        } else {
            $new->uri = $new->isSandbox === false ? new ProductionUri() : new SandboxUri();
        }

        $new->uri = $new->uri
            ->withPath($new->uri->getPath() . $this->requestTarget)
            ->withQuery($this->uri->getQuery())
            ->withFragment($this->uri->getFragment());
        $new->updateHostFromUri();
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

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
