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
 * This is the writeable trait.
 *
 * @author Brian Faust <hello@basecode.sh>
 */
trait Writeable
{
    use Writes\Floats,
        Writes\Hex,
        Writes\Integer,
        Writes\Strings,
        Writes\UnsignedInteger;
}
