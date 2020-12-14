<?php

declare(strict_types=1);

/**
 * Copyright (c) Konceiver Oy <info@konceiver.dev>
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 */

namespace Konceiver\Tests\ByteBuffer\Concerns\Reads;

use Konceiver\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * This is the sizeable test class.
 *
 * @author Brian Faust <brian@konceiver.dev>
 * @covers \Konceiver\ByteBuffer\Concerns\Sizeable
 */
class SizeableTest extends TestCase
{
    /** @test */
    public function it_should_return_the_capacity()
    {
        $buffer = ByteBuffer::new(8);

        $this->assertSame(8, $buffer->capacity());
    }

    /** @test */
    public function it_should_return_the_internal_capacity()
    {
        $buffer = ByteBuffer::new(8);

        $this->assertSame(8, $buffer->internalSize());
    }

    /** @test */
    public function it_should_ensure_the_given_capacity()
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->ensureCapacity(32);

        $this->assertSame(32, $buffer->capacity());
    }

    /** @test */
    public function it_should_keep_the_given_capacity()
    {
        $buffer = ByteBuffer::new('Hello World');

        $this->assertInstanceOf(ByteBuffer::class, $buffer->ensureCapacity(5));
        $this->assertSame(11, $buffer->capacity());
    }

    /** @test */
    public function it_should_resize_the_buffer()
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->resize(32);

        $this->assertSame(32, $buffer->capacity());
    }

    /** @test */
    public function it_should_return_the_remaining_bytes()
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->remaining();

        $this->assertSame(11, $buffer->remaining());
    }
}
