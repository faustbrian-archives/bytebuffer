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
 * This is the integer reader test class.
 *
 * @author Brian Faust <hello@basecode.sh>
 * @covers \KodeKeep\ByteBuffer\Concerns\Reads\Floats
 */
class FloatsTest extends TestCase
{
    /** @test */
    public function it_should_read_float32()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat32(8.0);
        $buffer->position(0);

        $this->assertSame(8.0, $buffer->readFloat32());
    }

    /** @test */
    public function it_should_read_float64()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat64(8.0);
        $buffer->position(0);

        $this->assertSame(8.0, $buffer->readFloat64());
    }

    /** @test */
    public function it_should_read_double()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeDouble(8.0);
        $buffer->position(0);

        $this->assertSame(8.0, $buffer->readDouble());
    }
}
