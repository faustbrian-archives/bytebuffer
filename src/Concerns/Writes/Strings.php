<?php

declare(strict_types=1);

/*
 * This file is part of ByteBuffer.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\ByteBuffer\Concerns\Writes;

/**
 * This is the strings writer trait.
 *
 * @author Brian Faust <hello@basecode.sh>
 */
trait Strings
{
    /**
     * Writes a payload of bytes. This is an alias of append.
     *
     * @param string $value
     * @param int    $offset
     *
     * @return \KodeKeep\ByteBuffer\ByteBuffer
     */
    public function writeBytes(string $value, int $offset = 0): self
    {
        return $this->append($value, $offset);
    }

    /**
     * Writes an UTF8 encoded string. This is an alias of writeUTF8String.
     *
     * @param string $value
     * @param int    $offset
     *
     * @return \KodeKeep\ByteBuffer\ByteBuffer
     */
    public function writeString(string $value, int $offset = 0): self
    {
        return $this->writeUTF8String($value, $offset);
    }

    /**
     * Writes an UTF8 encoded string.
     *
     * @param string $value
     * @param int    $offset
     *
     * @return \KodeKeep\ByteBuffer\ByteBuffer
     */
    public function writeUTF8String(string $value, int $offset = 0): self
    {
        $value = utf8_encode($value);
        $length = strlen($value);

        return $this->pack("a{$length}", $value, $offset);
    }

    /**
     * Writes a NULL-terminated UTF8 encoded string.
     *
     * @param string $value
     * @param int    $offset
     *
     * @return \KodeKeep\ByteBuffer\ByteBuffer
     */
    public function writeCString(string $value, int $offset = 0): self
    {
        $value = utf8_encode($value.' ');
        $length = strlen($value);

        return $this->pack("Z{$length}", $value, $offset);
    }

    /**
     * Writes a length as uint32 prefixed UTF8 encoded string.
     *
     * @param string $value
     * @param int    $offset
     *
     * @return \KodeKeep\ByteBuffer\ByteBuffer
     */
    public function writeIString(string $value, int $offset = 0): self
    {
        $this->fill(3);
        $this->pack('C', strlen($value), 0);

        return $this->writeUTF8String($value, $offset);
    }

    /**
     * Writes a length as varint32 prefixed UTF8 encoded string.
     *
     * @param string $value
     * @param int    $offset
     *
     * @return \KodeKeep\ByteBuffer\ByteBuffer
     */
    public function writeVString(string $value, int $offset = 0): self
    {
        $this->pack('C', strlen($value), 0);

        return $this->writeUTF8String($value, $offset);
    }
}
