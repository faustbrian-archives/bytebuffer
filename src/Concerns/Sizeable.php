<?php

declare(strict_types=1);

/**
 * Copyright (c) Konceiver Oy <info@konceiver.dev>
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 */

namespace Konceiver\ByteBuffer\Concerns;

/**
 * This is the sizeable trait.
 *
 * @author Brian Faust <brian@konceiver.dev>
 */
trait Sizeable
{
    /**
     * Gets the length of this ByteBuffers backing buffer.
     *
     * @return int
     */
    public function capacity(): int
    {
        return $this->length;
    }

    /**
     * Gets the length of the value stored in this ByteBuffer.
     *
     * @return int
     */
    public function internalSize(): int
    {
        return count($this->buffer);
    }

    /**
     * Makes sure that this ByteBuffer is backed by a buffer of at least the specified capacity.
     *
     * @param int $capacity
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function ensureCapacity(int $capacity): self
    {
        $current = $this->capacity();

        if ($current < $capacity) {
            return $this->resize($capacity);
        }

        return $this;
    }

    /**
     * Resizes this ByteBuffer to be backed by a buffer of at least the given capacity.
     *
     * @param int $capacity
     *
     * @return \Konceiver\ByteBuffer\ByteBuffer
     */
    public function resize(int $capacity): self
    {
        $current = $this->buffer;

        $this->initializeBuffer($capacity, pack("x{$capacity}"));

        $this->buffer = array_replace($this->buffer, $current);

        return $this;
    }

    /**
     * Gets the number of remaining readable bytes.
     *
     * @return int
     */
    public function remaining(): int
    {
        return $this->capacity() - $this->offset;
    }
}
