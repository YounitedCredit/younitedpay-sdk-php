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

namespace YounitedPaySDK;

use Exception;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

use function clearstatcache;
use function fclose;
use function feof;
use function fseek;
use function fstat;
use function ftell;
use function is_resource;
use function var_export;

use const SEEK_CUR;
use const SEEK_SET;

/**
 * @final This class should never be extended. See https://github.com/Nyholm/psr7/blob/master/doc/final.md
 */
class Stream implements StreamInterface
{
    /** @var resource|null A resource reference */
    private $stream;

    /** @var bool */
    private $seekable;

    /** @var bool */
    private $readable;

    /** @var bool */
    private $writable;

    /** @var array|mixed|void|bool|null */
    private $uri;

    /** @var int|null */
    private $size;

    /** @var array<mixed> Hash of readable and writable stream types */
    private static $READ_WRITE_HASH = [
        'read' => [
            'r' => true, 'w+' => true, 'r+' => true, 'x+' => true, 'c+' => true,
            'rb' => true, 'w+b' => true, 'r+b' => true, 'x+b' => true,
            'c+b' => true, 'rt' => true, 'w+t' => true, 'r+t' => true,
            'x+t' => true, 'c+t' => true, 'a+' => true,
        ],
        'write' => [
            'w' => true, 'w+' => true, 'rw' => true, 'r+' => true, 'x+' => true,
            'c+' => true, 'wb' => true, 'w+b' => true, 'r+b' => true,
            'x+b' => true, 'c+b' => true, 'w+t' => true, 'r+t' => true,
            'x+t' => true, 'c+t' => true, 'a' => true, 'a+' => true,
        ],
    ];

    /**
     * Creates a new PSR-7 stream.
     *
     * @param string|resource|StreamInterface $body
     *
     * @return StreamInterface
     */
    public static function create($body = '')
    {
        if ($body instanceof StreamInterface) {
            return $body;
        }
        if (is_string($body)) {
            $resource = fopen('php://temp', 'rw+');
            if ($resource === false) {
                $new = new self();
                $new->stream = null;

                return $new;
            }
            fwrite($resource, $body);
            $body = $resource;
        }

        if (is_resource($body)) {
            $new = new self();
            $new->stream = $body;
            $meta = stream_get_meta_data($new->stream);
            $new->seekable = $meta['seekable'] && 0 === fseek($new->stream, 0, SEEK_CUR);
            $new->readable = isset(self::$READ_WRITE_HASH['read'][$meta['mode']]);
            $new->writable = isset(self::$READ_WRITE_HASH['write'][$meta['mode']]);

            return $new;
        }

        throw new InvalidArgumentException(
            'Body must be a ressource but ' . gettype($body) . ' is given.'
        );
    }

    /**
     * Closes the stream when the destructed.
     *
     * @return void
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function __toString()
    {
        if ($this->isSeekable()) {
            $this->seek(0);
        }

        return $this->getContents();
    }

    /**
     * @return void
     */
    public function close()
    {
        if (isset($this->stream)) {
            if (is_resource($this->stream)) {
                fclose($this->stream);
            }
            $this->detach();
        }
    }

    /**
     * @return resource|null
     */
    public function detach()
    {
        if (!isset($this->stream)) {
            return null;
        }

        $result = $this->stream;
        unset($this->stream);
        $this->size = $this->uri = null;
        $this->readable = $this->writable = $this->seekable = false;

        return $result;
    }
    /**
     * get Uri
     *
     * @return UriInterface
     */
    private function getUri()
    {
        if (false !== $this->uri) {
            $this->uri = empty($this->getMetadata('uri')) ? false : $this->getMetadata('uri');
        }

        return $this->uri;
    }

    /**
     * @return int|mixed|null
     */
    public function getSize()
    {
        if (null !== $this->size) {
            return $this->size;
        }

        if (!isset($this->stream)) {
            return null;
        }

        // Clear the stat cache if the stream has a URI
        if (empty($uri = $this->getUri()) === false) {
            clearstatcache(true, $uri);
        }

        $stats = (array) fstat($this->stream);
        if (empty($stats['size']) === false) {
            $this->size = $stats['size'];

            return $this->size;
        }

        return null;
    }

    /**
     * @return false|int
     */
    public function tell()
    {
        if (!isset($this->stream)) {
            throw new RuntimeException('Stream is detached');
        }

        if (false === $result = @ftell($this->stream)) {
            throw new RuntimeException(
                sprintf(
                    'Unable to determine stream position: %s',
                    empty(error_get_last()) === false ? error_get_last()['message'] : ''
                )
            );
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function eof()
    {
        return !isset($this->stream) || feof($this->stream);
    }

    /**
     * @return bool
     */
    public function isSeekable()
    {
        return $this->seekable;
    }

    /**
     * Seek on stream
     *
     * @param int $offset
     * @param int $whence
     *
     * @return void
     *
     * @throws RuntimeException
     */
    public function seek($offset, $whence = SEEK_SET)
    {
        if (!isset($this->stream)) {
            throw new RuntimeException('Stream is detached');
        }

        if (!$this->seekable) {
            throw new RuntimeException('Stream is not seekable');
        }

        if (-1 === fseek($this->stream, $offset, $whence)) {
            throw new RuntimeException('Unable to seek to stream position "' . $offset . '" with whence ' . var_export($whence, true));
        }
    }

    /**
     * Rewind stream
     *
     * @return void
     */
    public function rewind()
    {
        $this->seek(0);
    }

    /**
     * @return bool
     */
    public function isWritable()
    {
        return $this->writable;
    }

    /**
     * @param string $string
     *
     * @return false|int
     *
     * @throws RuntimeException
     */
    public function write($string)
    {
        if (!isset($this->stream)) {
            throw new RuntimeException('Stream is detached');
        }

        if (!$this->writable) {
            throw new RuntimeException('Cannot write to a non-writable stream');
        }

        // We can't know the size after writing anything
        $this->size = null;

        if (false === $result = @fwrite($this->stream, $string)) {
            throw new RuntimeException(
                sprintf(
                    'Unable to write stream position: %s',
                    empty(error_get_last()) === false ? error_get_last()['message'] : ''
                )
            );
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function isReadable()
    {
        return $this->readable;
    }

    /**
     * @param int $length
     *
     * @return false|string
     *
     * @throws RuntimeException
     */
    public function read($length)
    {
        if (!isset($this->stream)) {
            throw new RuntimeException('Stream is detached');
        }

        if (!$this->readable) {
            throw new RuntimeException('Cannot read from non-readable stream');
        }

        if (false === $result = @fread($this->stream, $length)) {
            throw new RuntimeException(
                sprintf(
                    'Unable to read from stream: %s',
                    empty(error_get_last()) === false ? error_get_last()['message'] : ''
                )
            );
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        if (!isset($this->stream)) {
            throw new RuntimeException('Stream is detached');
        }
        if (false === $contents = @stream_get_contents($this->stream)) {
            throw new RuntimeException(
                sprintf(
                    'Unable to read from stream: %s',
                    empty(error_get_last()) === false ? error_get_last()['message'] : ''
                )
            );
        }

        return $contents;
    }

    /**
     * @param string $key
     *
     * @return array|mixed|null
     */
    public function getMetadata($key = null)
    {
        if (!isset($this->stream)) {
            return $key ? null : [];
        }

        $meta = stream_get_meta_data($this->stream);

        if (null === $key) {
            return $meta;
        }

        return $meta[$key] ? null : $meta[$key];
    }
}
