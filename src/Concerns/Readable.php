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
 * This is the readable trait.
 *
 * @author Brian Faust <brian@konceiver.dev>
 */
trait Readable
{
    use Reads\Floats,
        Reads\Hex,
        Reads\Integer,
        Reads\Strings,
        Reads\UnsignedInteger;
}
