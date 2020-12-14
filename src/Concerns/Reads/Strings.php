<?php

declare(strict_types=1);

/**
 * Copyright (c) Konceiver Oy <info@konceiver.dev>
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 */

namespace Konceiver\ByteBuffer\Concerns\Reads;

/**
 * This is the strings reader trait.
 *
 * @author Brian Faust <brian@konceiver.dev>
 */
trait Strings
{
    /**
     * Reads an UTF8 encoded string. This is an alias of readUTF8String.
     *
     * @param int $length
     * @param int $offset
     *
     * @return string
     */
    public function readString(int $length, int $offset = 0): string
    {
        return $this->readUTF8String($length, $offset);
    }

    /**
     * Reads an UTF8 encoded string.
     *
     * @param int $length
     * @param int $offset
     *
     * @return string
     */
    public function readUTF8String(int $length, int $offset = 0): string
    {
        return utf8_decode($this->unpack("a{$length}", $offset));
    }

    /**
     * Reads a NULL-terminated UTF8 encoded string.
     *
     * @param int $length
     * @param int $offset
     *
     * @return string
     */
    public function readCString(int $length, int $offset = 0): string
    {
        return utf8_decode($this->unpack("Z{$length}", $offset));
    }

    /**
     * Reads a length as uint32 prefixed UTF8 encoded string.
     *
     * @param int $length
     * @param int $offset
     *
     * @return string
     */
    public function readIString(int $length, int $offset = 0): string
    {
        return $this->readString($length, 4 + $offset);
    }

    /**
     * Reads a length as varint32 prefixed UTF8 encoded string.
     *
     * @param int $length
     * @param int $offset
     *
     * @return string
     */
    public function readVString(int $length, int $offset = 0): string
    {
        return $this->readString($length, 1 + $offset);
    }
}
