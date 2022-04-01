<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounitedpaysdk
 * @author    Michael Dowling and contributors to guzzlehttp/psr7
 * @author    Tobias Nyholm  and contributors to Nyholm/psr7
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Request;

use Psr\Http\Message\StreamInterface;

/**
 * Trait implementing functionality common to requests and responses.
 *
 * @author Michael Dowling and contributors to guzzlehttp/psr7
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Martijn van der Ven <martijn@vanderven.se>
 *
 * @internal should not be used outside of Nyholm/Psr7 as it does not fall under our BC promise
 */
trait MessageTrait
{
    /** @var array<mixed> Map of all registered headers, as original name => array of values */
    protected $headers = [];

    /** @var array<string> Map of lowercase header name => original name at registration */
    protected $headerNames = [];

    /** @var string */
    protected $protocol = '1.1';

    /** @var StreamInterface|null */
    protected $stream;

    /**
     * @inherit
     */
    public function getProtocolVersion()
    {
        return $this->protocol;
    }

    /**
     * @inherit
     */
    public function withProtocolVersion($version)
    {
        if ($this->protocol === $version) {
            return $this;
        }

        $new = clone $this;
        $new->protocol = $version;

        return $new;
    }

    /**
     * @inherit
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @inherit
     */
    public function hasHeader($header)
    {
        return isset($this->headerNames[\strtr($header, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz')]);
    }

    /**
     * @inherit
     */
    public function getHeader($header)
    {
        $header = \strtr($header, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
        if (!isset($this->headerNames[$header])) {
            return [];
        }

        $header = $this->headerNames[$header];

        return $this->headers[$header];
    }

    /**
     * @inherit
     */
    public function getHeaderLine($header)
    {
        return \implode(', ', $this->getHeader($header));
    }

    /**
     * @inherit
     */
    public function withHeader($header, $value)
    {
        $value = $this->validateAndTrimHeader($header, $value);
        $normalized = \strtr($header, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');

        $new = clone $this;
        if (isset($new->headerNames[$normalized])) {
            unset($new->headers[$new->headerNames[$normalized]]);
        }
        $new->headerNames[$normalized] = $header;
        $new->headers[$header] = $value;

        return $new;
    }

    /**
     * @inherit
     */
    public function withAddedHeader($header, $value)
    {
        if (!\is_string($header) || '' === $header) {
            throw new \InvalidArgumentException('Header name must be an RFC 7230 compatible string.');
        }

        $new = clone $this;
        $new->setHeaders([$header => $value]);

        return $new;
    }

    /**
     * @inherit
     */
    public function withoutHeader($header)
    {
        $normalized = \strtr($header, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
        if (!isset($this->headerNames[$normalized])) {
            return $this;
        }

        $header = $this->headerNames[$normalized];
        $new = clone $this;
        unset($new->headers[$header], $new->headerNames[$normalized]);

        return $new;
    }

    /**
     * @inherit
     */
    public function getBody()
    {
        if (null === $this->stream) {
            $this->stream = Stream::create('');
        }

        return $this->stream;
    }

    /**
     * @inherit
     */
    public function withBody(StreamInterface $body)
    {
        if ($body === $this->stream) {
            return $this;
        }

        $new = clone $this;
        $new->stream = $body;

        return $new;
    }

    /**
     * Set headers
     *
     * @param array<mixed> $headers
     *
     * @return void
     */
    public function setHeaders(array $headers)
    {
        foreach ($headers as $header => $value) {
            if (\is_int($header)) {
                // If a header name was set to a numeric string, PHP will cast the key to an int.
                // We must cast it back to a string in order to comply with validation.
                $header = (string) $header;
            }
            $value = $this->validateAndTrimHeader($header, $value);
            $normalized = \strtr($header, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
            if (isset($this->headerNames[$normalized])) {
                $header = $this->headerNames[$normalized];
                $this->headers[$header] = \array_merge($this->headers[$header], $value);
            } else {
                $this->headerNames[$normalized] = $header;
                $this->headers[$header] = $value;
            }
        }
    }

    /**
     * Make sure the header complies with RFC 7230.
     *
     * Header names must be a non-empty string consisting of token characters.
     *
     * Header values must be strings consisting of visible characters with all optional
     * leading and trailing whitespace stripped. This method will always strip such
     * optional whitespace. Note that the method does not allow folding whitespace within
     * the values as this was deprecated for almost all instances by the RFC.
     *
     * header-field = field-name ":" OWS field-value OWS
     * field-name   = 1*( "!" / "#" / "$" / "%" / "&" / "'" / "*" / "+" / "-" / "." / "^"
     *              / "_" / "`" / "|" / "~" / %x30-39 / ( %x41-5A / %x61-7A ) )
     * OWS          = *( SP / HTAB )
     * field-value  = *( ( %x21-7E / %x80-FF ) [ 1*( SP / HTAB ) ( %x21-7E / %x80-FF ) ] )
     *
     * @see https://tools.ietf.org/html/rfc7230#section-3.2.4
     * @param mixed $header
     * @param mixed $values
     *
     * @return array<string>
     */
    protected function validateAndTrimHeader($header, $values)
    {
        if (!\is_string($header) || 1 !== \preg_match("@^[!#$%&'*+.^_`|~0-9A-Za-z-]+$@", $header)) {
            throw new \InvalidArgumentException('Header name must be an RFC 7230 compatible string.');
        }

        if (!\is_array($values)) {
            // This is simple, just one value.
            if ((!\is_numeric($values) && !\is_string($values)) || 1 !== \preg_match("@^[ \t\x21-\x7E\x80-\xFF]*$@", (string) $values)) {
                throw new \InvalidArgumentException('Header values must be RFC 7230 compatible strings.');
            }

            return [\trim((string) $values, " \t")];
        }

        if (empty($values)) {
            throw new \InvalidArgumentException('Header values must be a string or an array of strings, empty array given.');
        }

        // Assert Non empty array
        $returnValues = [];
        foreach ($values as $v) {
            if ((!\is_numeric($v) && !\is_string($v)) || 1 !== \preg_match("@^[ \t\x21-\x7E\x80-\xFF]*$@", (string) $v)) {
                throw new \InvalidArgumentException('Header values must be RFC 7230 compatible strings.');
            }

            $returnValues[] = \trim((string) $v, " \t");
        }

        return $returnValues;
    }
}
