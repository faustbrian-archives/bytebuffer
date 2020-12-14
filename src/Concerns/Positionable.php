<?php

declare(strict_types=1);

/**
 * Copyright (c) Konceiver Oy <legal@konceiver.dev>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Konceiver\ByteBuffer\Concerns;

/**
 * This is the positionable trait.
 *
 * @author Brian Faust <brian@konceiver.dev>
 */
trait Positionable
{
    /**
     * Gets the absolute read/write offset.
     *
     * @return int
     */
    public function current(): int
    {
        return $this->offset;
    }

    /**
     * Sets this ByteBuffers absolute read/write offset.
     *
     * @param int $offset
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function position(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Skips N amount of bytes.
     *
     * @param int $length
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function skip(int $length): self
    {
        $this->offset += $length;

        return $this;
    }

    /**
     * Rewinds N amount of bytes.
     *
     * @param int $length
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function rewind(int $length): self
    {
        $this->offset -= $length;

        return $this;
    }

    /**
     * Resets this ByteBuffers offset.
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function reset(): self
    {
        $this->offset = 0;

        return $this;
    }

    /**
     * Clears this ByteBuffers offsets.
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function clear(): self
    {
        $this->offset = 0;
        $this->length = count($this->buffer);

        return $this;
    }
}
