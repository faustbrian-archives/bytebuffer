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

namespace KodeKeep\ByteBuffer\Concerns;

/**
 * This is the readable trait.
 *
 * @author Brian Faust <hello@basecode.sh>
 */
trait Readable
{
    use Reads\Floats,
        Reads\Hex,
        Reads\Integer,
        Reads\Strings,
        Reads\UnsignedInteger;
}
