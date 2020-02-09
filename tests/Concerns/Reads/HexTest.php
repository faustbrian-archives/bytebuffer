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

namespace KodeKeep\Tests\ByteBuffer\Concerns\Reads;

use KodeKeep\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * This is the hex reader test class.
 *
 * @author Brian Faust <hello@basecode.sh>
 * @covers \KodeKeep\ByteBuffer\Concerns\Reads\Hex
 */
class HexTest extends TestCase
{
    /** @test */
    public function it_should_read_hex()
    {
        $buffer = ByteBuffer::new(0);
        $buffer->writeHex('48656c6c6f20576f726c64');
        $buffer->position(0);

        $this->assertSame(11, $buffer->internalSize());
        $this->assertSame('48656c6c6f20576f726c64', $buffer->readHex(22));
    }

    /** @test */
    public function it_should_read_hex_as_string()
    {
        $buffer = ByteBuffer::new(0);
        $buffer->writeHex('48656c6c6f20576f726c64');
        $buffer->position(0);

        $this->assertSame(11, $buffer->internalSize());
        $this->assertSame('Hello World', $buffer->readHexString(22));
    }
}
