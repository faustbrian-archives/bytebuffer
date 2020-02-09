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

namespace KodeKeep\ByteBuffer\Concerns\Reads;

/**
 * This is the floats reader trait.
 *
 * @author Brian Faust <hello@basecode.sh>
 */
trait Floats
{
    /**
     * Reads a 32bit float.
     *
     * @param int $offset
     *
     * @return float
     */
    public function readFloat32(int $offset = 0): float
    {
        return $this->unpack(['G', 'g', 'f'][$this->order], $offset);
    }

    /**
     * Reads a 64bit float.
     *
     * @param int $offset
     *
     * @return float
     */
    public function readFloat64(int $offset = 0): float
    {
        return $this->unpack(['E', 'e', 'd'][$this->order], $offset);
    }

    /**
     * Reads a 64bit float. This is an alias of readFloat64.
     *
     * @param int $offset
     *
     * @return float
     */
    public function readDouble(int $offset = 0): float
    {
        return $this->readFloat64($offset);
    }
}
