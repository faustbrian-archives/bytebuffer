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
 * This is the string reader test class.
 *
 * @author Brian Faust <hello@basecode.sh>
 * @covers \KodeKeep\ByteBuffer\Concerns\Reads\Strings
 */
class StringsTest extends TestCase
{
    /** @test */
    public function it_should_read_string()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeString('Hello World');
        $buffer->position(0);

        $this->assertSame('Hello World', $buffer->readString(11));
    }

    /** @test */
    public function it_should_read_utf8_string()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUTF8String('Hello World 😄');
        $buffer->position(0);

        $this->assertSame('Hello World 😄', $buffer->readUTF8String(20));
    }

    /** @test */
    public function it_should_read_c_string()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeCString('Hello World ');
        $buffer->position(0);

        $this->assertSame('Hello World', $buffer->readCString(11));
    }

    /** @test */
    public function it_should_read_i_string()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeIString('Hello World');
        $buffer->position(0);

        $this->assertSame('Hello World', $buffer->readIString(11));
    }

    /** @test */
    public function it_should_write_v_string()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeVString('Hello World');
        $buffer->position(0);

        $this->assertSame('Hello World', $buffer->readVString(11));
    }
}
